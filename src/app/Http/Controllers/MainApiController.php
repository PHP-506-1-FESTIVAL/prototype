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
    public function index($str_val){
    // 축제 지역 및 월 분리
    $arr_temp = explode(',', $str_val);

    $arr_val = [
        'area_code' => $arr_temp[0], // 축제 지역 코드
        'month' => sprintf('%02d', $arr_temp[1]), // 선택된 월
    ];

    $fes_temp = Festival::select([
        'festival_id', 'festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
    ]);
    // if ($arr_temp[0]!=="") {
    //     $fes_info=$fes_temp ->where('area_code', $arr_val['area_code']);
    // }
    // $fes_info=$fes_temp->where(function ($query) use ($arr_val) {
    //     $query->whereRaw('MONTH(festival_start_date) = ?', [$arr_val['month']]) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
    //     ->orWhereRaw('MONTH(festival_end_date) = ?', [$arr_val['month']]); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
    // })
    // ->orderBy('festival_hit')
    // ->get();
    // $fes_info="";
    if ($arr_temp[0]==""&&$arr_temp[1]=="") {
        $fes_info=$fes_temp->orderBy('festival_hit')->get();
    }
    else if($arr_temp[0]!=""&&$arr_temp[1]==""){
        $fes_info=$fes_temp->where('area_code', $arr_val['area_code'])->orderBy('festival_hit')->get();
    }
    else if($arr_temp[0]==""&&$arr_temp[1]!=""){
        $fes_info=$fes_temp->where(function ($query) use ($arr_val) {
                $query->whereRaw('MONTH(festival_start_date) = ?', [$arr_val['month']]) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
                ->orWhereRaw('MONTH(festival_end_date) = ?', [$arr_val['month']]); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
        })->orderBy('festival_hit')->get();
    }
    else if($arr_temp[0]!=""&&$arr_temp[1]!=""){
        $fes_info=$fes_temp->where('area_code', $arr_val['area_code'])->where(function ($query) use ($arr_val) {
            $query->whereRaw('MONTH(festival_start_date) = ?', [$arr_val['month']]) // 축제 시작 날짜의 월과 선택된 월이 일치하는 경우
            ->orWhereRaw('MONTH(festival_end_date) = ?', [$arr_val['month']])->orderBy('festival_hit')->get(); // 축제 종료 날짜의 월과 선택된 월이 일치하는 경우
    });
    }
    // dump($fes_info[0]);

    foreach ($fes_info as $value) {
        switch ($value->area_code) {
            case "1":
                $areaName = '서울';
                break;
            case "2":
                $areaName = '인천';
                break;
            case "3":
                $areaName = '대전';
                break;
            case "4":
                $areaName = '대구';
                break;
            case "5":
                $areaName = '광주';
                break;
            case 6:
                $areaName = '부산';
                break;
            case 7:
                $areaName = '울산';
                break;
            case 8:
                $areaName = '세종';
                break;
            case 31:
                $areaName = '경기';
                break;
            case 32:
                $areaName = '강원';
                break;
            case 33:
                $areaName = '충북';
                break;
            case 34:
                $areaName = '충남';
                break;
            case 35:
                $areaName = '경북';
                break;
            case 36:
                $areaName = '경남';
                break;
            case 37:
                $areaName = '전북';
                break;
            case 38:
                $areaName = '전남';
                break;
            case 39:
                $areaName = '제주';
                break;
            default:
                $areaName = 'Unknown';
        }
        $value->area_code=$areaName;
    }
    $today = date('Y-m-d');
    foreach ($fes_info as $val) {
        if ($today<$val->festival_start_date) {
            $val->statusClass='btn-success';
            $val->statusText='D - '.date_diff(date_create($today), date_create($val->festival_start_date))->format('%a');
        }
        elseif ($today>$val->festival_end_date) {
            $val->statusClass = 'btn-secondary';
            $val->statusText = '진행종료';
        }
        else {
            $val->statusClass = 'btn-primary';
            $val->statusText = '진행중';
        }
    }
    // dump($fes_info);
    // dump($fes_info[0]);
    return $fes_info;
}
    public function all()
    {
        $fes_all_info=Festival::all();

    foreach ($fes_all_info as $value) {
        switch ($value->area_code) {
            case "1":
                $areaName = '서울';
                break;
            case "2":
                $areaName = '인천';
                break;
            case "3":
                $areaName = '대전';
                break;
            case "4":
                $areaName = '대구';
                break;
            case "5":
                $areaName = '광주';
                break;
            case 6:
                $areaName = '부산';
                break;
            case 7:
                $areaName = '울산';
                break;
            case 8:
                $areaName = '세종';
                break;
            case 31:
                $areaName = '경기';
                break;
            case 32:
                $areaName = '강원';
                break;
            case 33:
                $areaName = '충북';
                break;
            case 34:
                $areaName = '충남';
                break;
            case 35:
                $areaName = '경북';
                break;
            case 36:
                $areaName = '경남';
                break;
            case 37:
                $areaName = '전북';
                break;
            case 38:
                $areaName = '전남';
                break;
            case 39:
                $areaName = '제주';
                break;
            default:
                $areaName = 'Unknown';
        }
        $value->area_code=$areaName;
    }
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
