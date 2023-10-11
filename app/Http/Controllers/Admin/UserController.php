<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = validator($request->all(), [
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'name.required' => 'Name is required',
            'password.required' => 'Password is required',
            'email.unique' => 'Email must be unique',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }

        $request['password'] = Hash::make($request['password']);

        User::create([
            'name' => ($request['name']),
            'email' => ($request['email']),
            'password' => ($request['password']),
        ]);
        
        return response()->json([
            'status' => 200,
            'message' => 'User Created Successfully!',
        ]);
    }

    // Get All List of User
    public function getAllApi(){
        $data = User::all();
        return  DataTables::of($data)

        ->addColumn('name', function($data){
            return strtoupper($data->name) ;
        })

        ->addColumn('email', function($data){
            return ($data->email) ;
        })

        ->addColumn('action', function($data){
            $updateBtn="";
            $deleteBtn="";

                $updateBtn= "
                    <button title='Update User'  class='btn btn-sm btn-warning' data-toggle='modal' data-target='#modal_update'  id='updateUser'  data-myid='$data->id' data-attr=" . url('admin/user/api/details') . '/' . $data->id ."  ><i class='fas fa-pencil-alt'></i></button>
                ";

                $deleteBtn= "
                    <button title='Delete User'  class='btn btn-sm btn-danger' id='deleteCateogry'  onclick='delUserFunc($data->id)' data-myid='$data->id' ><i class='fas fa-trash'></i></button>
                ";

            return '<div role="group" style="flow-direction:row; gap:10%">'.
            $updateBtn.
            $deleteBtn.
            '</div>';

        })
        

        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::findorfail($userId);
        return response()->json([
            'user' => $user,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = $id;
        $validator = validator($request->all(), [
            'email' => 'required|unique:users,email, ' . $id,
            'name' => 'required',
        ], [
            'email.required' => 'Email is required',
            'name.required' => 'Name is required',
            'email.unique' => 'Email must be unique',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 300,
                'message' =>  $validator->errors()->first()
            ]);
        }
        
        $user = User::findorfail($id);

        $user->update([
            'email' => $request['email'],
            'name' => $request['name'],
        ]);

        if($request->has('password') && $request->filled('password')){
            $user->update([
                'password' => Hash::make($request['password']),
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User Updated Successfully!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $user = User::findorfail($userId);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'User Deleted Successfully!',
        ]);
    }


    /**
     * Activate/Deactivate User.
     */
    public function activeInactiveUser($id, $is_active){
        $user = User::findorfail($id);
        $user->update([
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
            'message' => "User Successfully ".$status."!",
        ]);
    }
    
}
