<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    function reportget() {
        return view('admin/report');
    }
}
