<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class MainApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($area_code)
    {
        //축제 지역/월 별 출력
        // $fes_info=Festival::all();
        $fes_info=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('area_code',$area_code)
        // ->where('festival_end_date','<',$month)
        ->orderBy('festival_hit')->limit(4)->get();

        return $fes_info;
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
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Festival $Festival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Festival  $Festival
     * @return \Illuminate\Http\Response
     */
    public function destroy(Festival $Festival)
    {
        //
    }
}
