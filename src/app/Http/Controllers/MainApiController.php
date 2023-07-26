<?php

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class MainApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($str_val){
    // 축제 지역 및 월 분리
    $arr_temp = explode(',', $str_val);

    $arr_val = [
        'area_code' => $arr_temp[0], // 축제 지역 코드
        'month' => sprintf('%02d', $arr_temp[1]), // 선택된 월
    ];
    
    if ($arr_temp[0]===""&&$arr_temp[1]==="") {
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $fes_info=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
    }
    else if($arr_temp[0]!==""&&$arr_temp[1]===""){
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->where('area_code', $arr_val['area_code'])->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->where('area_code', $arr_val['area_code'])->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $fes_info=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->where('area_code', $arr_val['area_code'])->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
    }
    else if($arr_temp[0]===""&&$arr_temp[1]!==""){
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $fes_info=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
        
    }
    else if($arr_temp[0]!=""&&$arr_temp[1]!=""){
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->where('area_code', $arr_val['area_code'])
        ->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->where('area_code', $arr_val['area_code'])
        ->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $fes_info=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->where('area_code', $arr_val['area_code'])
        ->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', $arr_val['month']) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', $arr_val['month']); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
    }
    $mapUtil=new MapUtil;
    $mapUtil->areacodeTrans($fes_info);
    $mapUtil->fesStat($fes_info);
    return $fes_info;
    }

    public function hit() {
        $hit=DB::select('SELECT select_cnt, COUNT(select_cnt) cs FROM festival_hits WHERE hit_timer > NOW() GROUP BY(select_cnt)  ORDER BY cs DESC LIMIT 5');
        return $hit;
    }

    public function all()
    {
        $fes_all_info=Festival::all();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($fes_all_info);
        return $fes_all_info;
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
