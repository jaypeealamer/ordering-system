<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use App\Models\Category\Category;
use App\Traits\MenuTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class MenuController extends Controller
{
    use MenuTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_active', '1')->get();
        return view('admin.menu.list', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = "";
        $validator = validator($request->all(), [
            'name' => 'required|unique:menu_tbl,name',
            'price' => 'required',
            'category' => 'required',
        ], [
            'name.required' => 'Name is required',
            'category.required' => 'Category is required',
            'price.required' => 'Price is required',
            'name.unique' => 'Name must be unique',
        ]);
     

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Carbon::now()->format("Y-m-d") . '-' .$image->getClientOriginalName();
            $image->storeAs('public/images/menu/'.$imageName);

        }

        Menu::create([
            'name' => strtolower($request['name']),
            'price' => $request['price'],
            'category_id' => $request['category'],
            'featured' => isset($request['featured']) ? $request['featured'] : 0,
            'description' => $request['description'],
            'image' => $imageName,
            'is_active' => 1
        ]);
        
        return response()->json([
            'status' => 200,
            'message' => 'Menu Created Successfully!',
        ]);
    }

    // Get All List of Category
    public function getAllApi(){
        $data = Menu::with("thecategory")->get();
        return  DataTables::of($data)

        ->addColumn('name', function($data){
            return strtoupper($data->name) ;
        })

        ->addColumn('price', function($data){
            return ($data->price) ;
        })

        ->addColumn('description', function($data){
            return ($data->description) ;
        })
        
        ->addColumn('image', function($data){
            $imagePath= $this->checkIfhasMenuImage(($data->image));
            return "<img width='150'  src='".asset($imagePath[1]). "'>" ;
        })

        ->addColumn('category', function($data){
            return ucwords($data->thecategory->name) ;
        })

        ->addColumn('featured', function($data){
            if($data->featured == '1'){
                return '<span class="text-success">Yes</span>' ;
            }
            else{
                return '<span class="text-danger">No</span>';
            }
        })

        ->addColumn('is_active', function($data){
            if($data->is_active == '1'){
                return '<span class="text-success">Active</span>' ;
            }
            else{
                return '<span class="text-danger">Inactive</span>';
            }
        })

        ->addColumn('action', function($data){
            $updateBtn="";
            $activeInactiveBtn= "";
            $deleteBtn="";

                $updateBtn= "
                    <button title='Update Menu'  class='btn btn-sm btn-warning' data-toggle='modal' data-target='#modal_update'  id='updateMenu'  data-myid='$data->id' data-attr=" . url('admin/menu/api/details') . '/' . $data->id ."  ><i class='fas fa-pencil-alt'></i></button>
                ";
                if($data->is_active == '0'){
                    $activeInactiveBtn= "
                        <button title='Activate Menu'  class='btn btn-sm btn-success' id='activateMenu'  onclick='activeInactiveMenuFunc($data->id, $data->is_active)'data-attr=" . url('admin/menu/api/active_inactive/') . '/' . " data-myid='$data->id' ><i class='far fa-circle-check'></i></button>
                    ";
                }
                else{
                    $activeInactiveBtn= "
                        <button title='Deactivate Menu'  class='btn btn-sm btn-primary' id='activateMenu'  onclick='activeInactiveMenuFunc($data->id, $data->is_active)'  data-attr=" . url('admin/menu/api/active_inactive/') . '/' . "   data-myid='$data->id' ><i class='far fa-circle-xmark'></i></button>
                    ";
                }

                $deleteBtn= "
                    <button title='Delete Menu'  class='btn btn-sm btn-danger' id='deleteMenu'  onclick='delMenuFunc($data->id)' data-myid='$data->id' ><i class='fas fa-trash'></i></button>
                ";

            return '<div role="group" style="width: 140px ; flow-direction:row; gap:10%">'.
            $updateBtn.
            $activeInactiveBtn.
            $deleteBtn.
            '</div>';

        })
        

        ->rawColumns(['action', 'is_active', 'image', 'featured'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show($menuId)
    {
        $menu = Menu::findorfail($menuId);
        return response()->json([
            'menu' => $menu,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = $id;
        return $request;
        $validator = validator($request->all(), [
            'name' => 'required|unique:menu_tbl,name, ' . $id,
            'price' => 'required',
            'category' => 'required',
        ], [
            'name.required' => 'Name is required',
            'category.required' => 'Category is required',
            'price.required' => 'Price is required',
            'name.unique' => 'Name must be unique',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        $menu = Menu::findorfail($id);

        // Check if has image
        $imagePath= $this->checkIfhasMenuImage(($menu->image));
        if($imagePath[0] && $request->hasFile('image')){
            //delete previous uploaded image
            Storage::delete($imagePath[1]);

            // replace new uploaded image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Carbon::now()->format("Y-m-d") . '-' .$image->getClientOriginalName();
                $image->storeAs('public/images/menu/'.$imageName);
                $menu->update([
                    'image' =>$imageName
                ]);
            }
        }


        $menu->update([
            'name' => strtolower($request['name']),
            'price' => $request['price'],
            'category_id' => $request['category'],
            'featured' => isset($request['featured']) ? $request['featured'] : 0,
            'description' => $request['description'],
            'is_active' => 1
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Menu Updated Successfully!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($menuId)
    {
        $menu = Menu::findorfail($menuId);
        $menu->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Menu Deleted Successfully!',
        ]);
    }


    /**
     * Activate/Deactivate menu.
     */
    public function activeInactiveMenu($id, $is_active){
        $menu = Menu::findorfail($id);
        $menu->update([
            'is_active' => ($is_active) ? 0 : 1
        ]);

        $status="";
        if($is_active == 1){
            $status = 'Deactivated';
           
        }else{
            $status = 'Activated';
        }

        return response()->json([
            'status' => 200,
            'message' => "Menu Successfully ".$status."!",
        ]);
    }
}
