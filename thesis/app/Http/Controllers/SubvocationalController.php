<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Subvocational;
use App\Http\Models\Vocational;

class SubvocationalController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $data = Subvocational::orderBy('id','DESC')->paginate(10);
       return view('subvocationals.index',compact('data'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $vocationals = Vocational::lists('name','id');
       return view('subvocationals.create',compact('vocationals'));
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
        'vocationals' => 'required',
        'quota' => 'required',
        'long_training' => 'required',
        'final_registration_date' => 'required',
       ]);

       $input = $request->all();
       $subvocational = Subvocational::create($input);
       foreach ($request->input('vocationals') as $key => $value) {
           $subvocational->Vocational($value);
       }

       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $subvocational = Subvocational::find($id);
       return view('subvocationals.show',compact('subvocational'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $vocational = Vocational::find($id);
       return view('vocationals.edit',compact('vocational'));

       $subvocational = Subvocational::find($id);
       $vocationals = Vocational::lists('name','id');
    //    $userRole = $user->roles->lists('id','id')->toArray();

       return view('subvocationals.edit',compact('subvocational','vocationals','userRole'));
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
        'vocationals' => 'required',
        'quota' => 'required',
        'long_training' => 'required',
        'final_registration_date' => 'required',
       ]);

       $input = $request->all();

       $subvocational = Subvocational::find($id);
       $subvocational->update($input);
    //    DB::table('role_user')->where('user_id',$id)->delete();

        foreach ($request->input('vocationals') as $key => $value) {
            // $user->attachRole($value);
        }
       Vocational::find($id)->update($request->all());

       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Subvocational::find($id)->delete();
       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil dihapus');
   }
}