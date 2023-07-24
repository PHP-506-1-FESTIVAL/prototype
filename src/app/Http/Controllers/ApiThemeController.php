<?php

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiThemeController extends Controller
{
    function theme($id) {
        $apiData = DB::table('festivals')->where('category','like','%'.$id.'%')->orderBy('festival_start_date','desc')->paginate(9);
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($apiData);
        return $apiData;
    }
}
