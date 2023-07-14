<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : AdminMainController
 * 파일명       : AdminMainController.php
 * 이력         : v002 0714 신유진 new
 ************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //메인 페이지 이동
    public function main() {
        // return '메인페이지';    //test
        return view('admin_main');

    }
}
