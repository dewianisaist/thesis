<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Criteria;
use App\Http\Models\Choice;
use Auth;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->roleId();

        if ($role_id == 3) {
            $i = 0;
            $criterias = Criteria::where('step', '=', '2')
                                    ->where('status', '=', '1')
                                    ->where('group_criteria', '=', null)
                                    ->whereNotIn('id', function($query){
                                        $query->select('criteria_id')
                                        ->from(with(new Choice)->getTable())
                                        ->where('suggestion', 1);
                                    })
                                    ->get();

            $criterias_group = array();
            $total_criterias = 0;

            foreach ($criterias as $criteria){
                $criterias_group[$criteria->id]["group"] = $criteria;
                $criterias_group[$criteria->id]["data"] = array();

                $subcriterias = Criteria::where('step', '=', '2')
                                            ->where('status', '=', '1')
                                            ->where('group_criteria', '=', $criteria->id)
                                            ->whereNotIn('id', function($query){
                                                $query->select('criteria_id')
                                                ->from(with(new Choice)->getTable())
                                                ->where('suggestion', 1);
                                            })
                                            ->orderBy('id','DESC')
                                            ->get();

                foreach ($subcriterias as $subcriteria){
                    $criterias_group[$criteria->id]["data"][] = $subcriteria;
                }
            }

            return view('weights.index',compact('criterias_group', 'i'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
