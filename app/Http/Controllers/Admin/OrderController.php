<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Menu\Menu;
use App\Models\Orders\Orders;
use App\Models\StatusHistory\StatusHistory;
use Illuminate\Http\Request;
use App\Traits\MenuTraits;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    use MenuTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_active', '1')->get();
        return view('home.list', compact('categories'));
    }

     /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        return view('admin.orders.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = validator($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'address' => 'required',
            'quantity' => 'required',
        ], [
            'name.required' => 'Name  is required',
            'number.required' => 'Number  is required',
            'address.required' => 'Address is required',
            'quantity.required' => 'Quantity is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        $order = Orders::create([
            'name' => strtolower($request['name']),
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'number' => $request['number'],
            'address' => $request['address'],
            'menu_id' => $request['menu_id'],
        ]);
        

        StatusHistory::create([
            'status'=>'ordered',
            'order_id'=>$order->id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Orders Successfully Created',
        ]);
    }

    // Get All List of Menu
    public function getAllApi(){
        $data = Menu::with("thecategory")->where('is_active', 1)->get();
        return  DataTables::of($data)

        ->addColumn('name', function($data){
            return strtoupper($data->name) ;
        })

        ->addColumn('price', function($data){
            $price = number_format((float)$data->price, 2, '.', '');
            return '₱ '. ($price) ;
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


        ->addColumn('action', function($data){

                $orderBtn= "
                    <button title='Order Now'  class='btn btn-sm btn-info' data-toggle='modal' data-target='#modal_order'  id='create_order'  data-myid='$data->id' data-attr=" . url('order/api/details') . '/' . $data->id ."  ><i class='fas fa-shopping-cart'></i> Order Now</button>
                ";
             

            return '<div role="group" style="width: 140px ; flow-direction:row; gap:10%">'.
            $orderBtn.
            '</div>';

        })
        

        ->rawColumns(['action', 'image'])
        ->make(true);
    }

    public function getAllApiAdmin(){
        $data = Orders::with("themenu", "themenu.thecategory")->get();
        return  DataTables::of($data)

        ->addColumn('name', function($data){
            return strtoupper($data->themenu->name) ;
        })

        ->addColumn('order_status', function($data){
            return strtoupper($data->status) ;
        })

        ->addColumn('price', function($data){
            $price = number_format((float)$data->price, 2, '.', '');
            return '₱'. ($price) ;
        })

        ->addColumn('quantity', function($data){
            return $data->quantity;
        })

        ->addColumn('total_price', function($data){
            $total = $data->price * $data->quantity;
            $price = number_format((float)$total, 2, '.', '');
            return '₱'. ($price) ;
        })

        ->addColumn('description', function($data){
            return ($data->themenu->description) ;
        })
        
        ->addColumn('image', function($data){
            $imagePath= $this->checkIfhasMenuImage(($data->themenu->image));
            return "<img width='150'  src='".asset($imagePath[1]). "'>" ;
        })

        ->addColumn('category', function($data){
            return ucwords($data->themenu->thecategory->name) ;
        })


        ->addColumn('customer_name', function($data){
            return ucwords($data->name) ;
        })


        ->addColumn('phone_number', function($data){
            return ($data->name) ;
        })




        ->addColumn('action', function($data){

                $orderBtn= "
                    <button title='Update Status'  class='btn btn-sm btn-info' data-toggle='modal' data-target='#modal_update_status'  id='update_status'  data-myid='$data->id' data-mystatus='$data->status' data-attr=" . url('order/api/details') . '/' . $data->id ."  ><i class='fas fa-edit'></i></button>
                    
                ";
                $history= "
                <button title='View Status History'  class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#modal_status_history'  onclick='viewStatusHistory($data->id)' id='view_status_history'  data-myid='$data->id' data-mystatus='$data->status' data-attr=" . url('order/api/details') . '/' . $data->id ."  ><i class='fas fa-history'></i></button>
            ";
             

            return '<div role="group" style="width: 140px ; flow-direction:row; gap:10%">'.
            $orderBtn.
            $history.
            '</div>';

        })
        

        ->rawColumns(['action', 'image'])
        ->make(true);
    }

    public function getAllApiHistoryAdmin(Request $request){
        $data = StatusHistory::where('order_id', $request['id'])
        ->orderBy('id','DESC')->get();
        return  DataTables::of($data)


        ->addColumn('order_status', function($data){
            return ucwords($data->status) ;
        })
        
        ->addColumn('created_date', function($data){
            return ($data->created_at) ;
        })




        ->addColumn('action', function($data){

                $orderBtn= "
                    <button title='Update Status'  class='btn btn-sm btn-info' data-toggle='modal' data-target='#modal_update_status'  id='update_status'  data-myid='$data->id' data-mystatus='$data->status' data-attr=" . url('order/api/details') . '/' . $data->id ."  ><i class='fas fa-edit'></i></button>
                ";
                $history= "
                <button title='View Status History'  class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#modal_status_history'  id='view_status_history'  data-myid='$data->id' data-mystatus='$data->status' data-attr=" . url('order/api/details') . '/' . $data->id ."  ><i class='fas fa-history'></i></button>
            ";
             

            return '<div role="group" style="width: 140px ; flow-direction:row; gap:10%">'.
            $orderBtn.
            $history.
            '</div>';

        })
        

        ->rawColumns(['action', 'image'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryId)
    {
        $menu = Menu::findorfail($categoryId);
        return response()->json([
            'menu' => $menu,
        ]);
    }


    
    /**
     * Update order status.
     */
    public function updateStatus(Request $request, $id)
    {

        $orders = Orders::findorfail($id);
        $orders->update([
            'status'=>$request['status']
        ]);
        StatusHistory::create([
            'status'=>$request['status'],
            'order_id'=>$orders->id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Order Status Updated Successfully!',

        ]);
    }

    public function countNewOrder(){
        return Orders::where('status', 'ordered')->count();
    }

}
