<?php

namespace App\Lib;

class MapUtil {

    public function areacodeTrans($param) {

        foreach ($param as $value) {
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

    }
    public function fesStat($param)
    {
        $today = date('Y-m-d');
        foreach ($param as $val) {
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
    }

}
