<?php

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiThemeController extends Controller
{
    function theme($id, $area) {
        $areaarr = explode('+', $area);

        $wherequery = " WHERE category like '%".$id."%' ";
        
        if($area != 'blank') {
            $wherequery .= " AND ( area_code = ".$areaarr[0]." ";
            foreach ($areaarr as $val) {
                $wherequery .= " OR area_code = ".$val." ";
            }
            $wherequery .= " ) ";
        }

        $query = "SELECT * FROM festivals ".$wherequery." ORDER BY festival_start_date DESC";

        $apiData = DB::select( $query );
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($apiData);
        return $apiData;
    }
}
