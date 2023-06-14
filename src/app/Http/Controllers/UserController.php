<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : UserController.php
 * 이력         : v001 0614 이가원 new
 ************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login() {
        return view('login');
    }

    function loginpost() {
        
    }

    function signup() {
        return '회원가입 페이지';
    }
}
