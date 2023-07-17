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
        if(auth()->guest()) {
            return "<script>alert('로그인 후 이용해 주세요.'); window.close();</script>";
        }
        $type = request()->type;
        $no = request()->no;
        return view('insertreport')->with('type', $type)->with('no', $no);
    }

    function insertpost(Request $req) {
        if($req->type === '0') {
            $data['board_id'] = $req->no;
        } else if($req->type === '1') {
            $data['comment_id'] = $req->no;
        }
        $data['user_id'] = session('user_id');
        $data['report_no'] = $req->reason;
        $data['report_detail'] = $req->detail;
        $data['report_type'] = $req->type;
        $report = Report::create($data);
        $report->save();
        return "<script>alert('신고가 완료되었습니다.'); window.close();</script>";;
    }
}
