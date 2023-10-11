<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.settings.category.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = validator($request->all(), [
            'name' => 'required|unique:category_tbl,name',
        ], [
            'name.required' => 'Category Name is required',
            'name.unique' => 'Category Name must be unique',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        Category::create([
            'name' => strtolower($request['name']),
            'description' => $request['description'],
            'is_active' => 1
        ]);
        
        return response()->json([
            'status' => 200,
            'message' => 'Category Created Successfully!',
        ]);
    }

    // Get All List of Category
    public function getAllApi(){
        $data = Category::all();
        return  DataTables::of($data)

        ->addColumn('name', function($data){
            return strtoupper($data->name) ;
        })

        ->addColumn('description', function($data){
            return ($data->description) ;
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
                    <button title='Update Category'  class='btn btn-sm btn-warning' data-toggle='modal' data-target='#modal_update'  id='updateCategory'  data-myid='$data->id' data-attr=" . url('admin/category/api/details') . '/' . $data->id ."  ><i class='fas fa-pencil-alt'></i></button>
                ";
                if($data->is_active == '0'){
                    $activeInactiveBtn= "
                        <button title='Activate Category'  class='btn btn-sm btn-success' id='activateCategory'  onclick='activeInactiveCategoryFunc($data->id, $data->is_active)'data-attr=" . url('admin/category/api/active_inactive/') . '/' . " data-myid='$data->id' ><i class='far fa-circle-check'></i></button>
                    ";
                }
                else{
                    $activeInactiveBtn= "
                        <button title='Deactivate Category'  class='btn btn-sm btn-primary' id='activateCategory'  onclick='activeInactiveCategoryFunc($data->id, $data->is_active)'  data-attr=" . url('admin/category/api/active_inactive/') . '/' . "   data-myid='$data->id' ><i class='far fa-circle-xmark'></i></button>
                    ";
                }

                $deleteBtn= "
                    <button title='Delete Category'  class='btn btn-sm btn-danger' id='deleteCateogry'  onclick='delCategoryFunc($data->id)' data-myid='$data->id' ><i class='fas fa-trash'></i></button>
                ";

            return '<div role="group" style="flow-direction:row; gap:10%">'.
            $updateBtn.
            $activeInactiveBtn.
            $deleteBtn.
            '</div>';

        })
        

        ->rawColumns(['action', 'is_active'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryId)
    {
        $category = Category::findorfail($categoryId);
        return response()->json([
            'category' => $category,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = $id;
        $validator = validator($request->all(), [
            'name' => 'required|unique:category_tbl,name, ' . $id,
        ], [
            'name.required' => 'Category Name is required',
            'name.unique' => 'Category Name must be unique',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        $category = Category::findorfail($id);

        $category->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Category Updated Successfully!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        $category = Category::findorfail($categoryId);
        $category->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Category Deleted Successfully!',
        ]);
    }


    /**
     * Activate/Deactivate category.
     */
    public function activeInactiveCategory($id, $is_active){
        $category = Category::findorfail($id);
        $category->update([
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
            'message' => "Category Successfully ".$status."!",
        ]);
    }
}
