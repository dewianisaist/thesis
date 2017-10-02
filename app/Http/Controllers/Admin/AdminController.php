<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use DB;
use Hash;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $data = Admin::orderBy('id','DESC')->paginate(5);
         return view('admin.users.index',compact('data'))
             ->with('i', ($request->input('page', 1) - 1) * 5);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $roles = Role::lists('display_name','id');
         return view('admin.users.create',compact('roles'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $this->validate($request, [
             'name' => 'required',
             'nip' => 'required|nip|unique:admins,nip',
             'password' => 'required|same:confirm-password',
             'roles' => 'required'
         ]);
 
         $input = $request->all();
         $input['password'] = Hash::make($input['password']);
 
         $user = Admin::create($input);
         foreach ($request->input('roles') as $key => $value) {
             $user->attachRole($value);
         }
 
         return redirect()->route('admin.users.index')
                         ->with('success','User created successfully');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $user = Admin::find($id);
         return view('admin.users.show',compact('user'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $user = Admin::find($id);
         $roles = Role::lists('display_name','id');
         $userRole = $user->roles->lists('id','id')->toArray();
 
         return view('admin.users.edit',compact('user','roles','userRole'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         $this->validate($request, [
             'name' => 'required',
             'nip' => 'required|nip|unique:admins,nip,'.$id,
             'password' => 'same:confirm-password',
             'roles' => 'required'
         ]);
 
         $input = $request->all();
         if(!empty($input['password'])){ 
             $input['password'] = Hash::make($input['password']);
         }else{
             $input = array_except($input,array('password'));    
         }
 
         $user = Admin::find($id);
         $user->update($input);
         DB::table('role_user')->where('user_id',$id)->delete();
 
         
         foreach ($request->input('roles') as $key => $value) {
             $user->attachRole($value);
         }
 
         return redirect()->route('admin.users.index')
                         ->with('success','User updated successfully');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         Admin::find($id)->delete();
         return redirect()->route('admin.users.index')
                         ->with('success','User deleted successfully');
     }
}
