<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Education;
use App\Http\Models\EducationalBackground;
use Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        
        if ($role_id == 1) {
            $educations = Education::orderBy('id','DESC')->paginate(10);

            return view('educations.index',compact('educations'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('profile_users.show');
        } 
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Auth::user()->roleId();
            
        if ($role_id == 1) {
            return view('educations.create');
        } else {
            return redirect()->route('profile_users.show');
        } 
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
            'stage' => 'required',
        ]);

        Education::create($request->all());

        return redirect()->route('educations.index')
                       ->with('success','Pendidikan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role_id = Auth::user()->roleId();
            
        if ($role_id == 1) {
            $education = Education::find($id);

            return view('educations.show',compact('education'));
        } else {
            return redirect()->route('profile_users.show');
        } 
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_id = Auth::user()->roleId();
            
        if ($role_id == 1) {
            $education = Education::find($id);

            return view('educations.edit',compact('education'));
        } else {
            return redirect()->route('profile_users.show');
        } 
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
            'stage' => 'required',
        ]);

        Education::find($id)->update($request->all());

        return redirect()->route('educations.index')
                       ->with('success','Pendidikan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educational_background = EducationalBackground::where('education_id', '=', $id)->first();
        
        if ($educational_background == null) {
            Education::find($id)->delete();

            return redirect()->route('educations.index')
                             ->with('success','Pendidikan berhasil dihapus');
        } else {
            return redirect()->route('educations.index')
                             ->with('failed','Pendidikan tidak bisa dihapus karena sudah digunakan sebagai riwayat pendidikan pendaftar');
        } 
    }
}
