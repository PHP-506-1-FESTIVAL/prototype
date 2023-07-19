<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    // 메인 페이지 이동
    public function requestget() {
        return view('admin.request');
    }
}
