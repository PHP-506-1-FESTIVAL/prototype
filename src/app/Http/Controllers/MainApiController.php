<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class MainApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($str_val)
    {
        //축제 지역/월 별 출력
        $arr_temp=explode(',',$str_val);
        // var_dump($arr_temp);
        $arr_val=['area_code'=>$arr_temp[0],'month'=>Date("Y-".sprintf('%02d',$arr_temp[1])."-d",time())];
        // var_dump($month);
        // $fes_info=Festival::all();
        // var_dump($arr_val);
        if ($arr_temp[1]==="") {
            $arr_val['month']=DATE("Y-m-d",time());
        }
        // $fes_info=Festival::select([
            //     'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
            // ])->where('area_code',$arr_val['area_code'])
            // ->where('festival_end_date','<',$arr_val['month'])
            // // ->where('festival_end_date','<',$month)
            // ->orderBy('festival_hit')->limit(4)->get();
            $fes_temp=Festival::select([
                'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
                ])->where('festival_end_date','<',$arr_val['month']);
                // ->where('festival_end_date','<',$month)
                if ($arr_temp[0]!=="") {
                    $fes_temp->where('area_code',$arr_val['area_code']);
                }
                $fes_info=$fes_temp->orderBy('festival_hit')->limit(4)->get();

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
