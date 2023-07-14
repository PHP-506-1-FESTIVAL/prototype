<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    function reportget() {
        return view('admin/report');
    }

    function insertget() {
        return view('insertreport');
    }

    function insertpost(Request $req) {
        $data['user_id'] = session('user_id');
        $data['report_no'] = $req->reason;
        $data['report_detail'] = $req->detail;
        $data['report_type'] = '0';
        $report = Report::create($data);
        $report->save();
        return '전송이 완료되었습니다.';
    }
}
