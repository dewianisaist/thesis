<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vocational;

class VocationalController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $vocationals = Vocational::orderBy('id','DESC')->paginate(10);
       return view('vocationals.index',compact('vocationals'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('vocationals.create');
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
        'description' => 'required',
       ]);

       Vocational::create($request->all());

       return redirect()->route('vocationals.index')
                       ->with('success','Kejuruan berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $vocational = Vocational::find($id);
       return view('vocationals.show',compact('vocational'));
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
           'description' => 'required',
       ]);

       Vocational::find($id)->update($request->all());

       return redirect()->route('vocationals.index')
                       ->with('success','Kejuruan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Vocational::find($id)->delete();
       return redirect()->route('vocationals.index')
                       ->with('success','Kejuruan berhasil dihapus');
   }
}
