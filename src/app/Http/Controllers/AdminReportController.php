<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    function reportget() {

        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }

        $status = request()->status;

        if($status == '0') {
            $data = Report::select('report_id', 'board_id', 'comment_id', 'user_id', 'report_type', 'report_no', 'report_detail', 'created_at', 'updated_at', 'handle_flg', 'admin_id')
                ->where('handle_flg', null)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else if ($status == '1') {
            $data = Report::select('report_id', 'board_id', 'comment_id', 'user_id', 'report_type', 'report_no', 'report_detail', 'created_at', 'updated_at', 'handle_flg', 'admin_id')
                ->where('handle_flg', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else if ($status == '2') {
            $data = Report::select('report_id', 'board_id', 'comment_id', 'user_id', 'report_type', 'report_no', 'report_detail', 'created_at', 'updated_at', 'handle_flg', 'admin_id')
                ->where('handle_flg', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $data = Report::select('report_id', 'board_id', 'comment_id', 'user_id', 'report_type', 'report_no', 'report_detail', 'created_at', 'updated_at', 'handle_flg', 'admin_id')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin/report')->with('data', $data)->with('status', $status);
    }

    function reportput(Request $req) {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        if($req->flg == '0') {
            if($req->board_id) {
                Board::destroy($req->board_id);
            } else {
                Comment::destroy($req->comment_id);
            }
        } else if ($req->flg == '1') {
            $report = Report::find($req->id);
            $report->handle_flg = $req->flg;
            $report->admin_id = session('admin_id');
            $report->save();
        }
        return redirect()->route('admin.report', ['status' => $req->status]);
    }

    function insertget() {
        if(auth()->guest()) {
            return "<script>alert('로그인 후 이용해 주세요.'); window.close();</script>";
        }
        $type = request()->type;
        $no = request()->no;
        if($type == '0') {
            $chk = Report::where('user_id', session('user_id'))->where('board_id', $no)->first();
            if($chk) {
                return "<script>alert('이미 신고한 게시글입니다.'); window.close();</script>";
            }
        } else if($type == '1') {
            $chk = Report::where('user_id', session('user_id'))->where('comment_id', $no)->first();
            if($chk) {
                return "<script>alert('이미 신고한 댓글입니다.'); window.close();</script>";
            }
        }
        return view('insertreport')->with('type', $type)->with('no', $no);
    }

    function insertpost(Request $req) {

        if(auth()->guest()) {
            return "<script>alert('로그인 후 이용해 주세요.'); window.close();</script>";
        }

        $req->validate([
            'detail'     => 'max:500'
        ]);

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
        return "<script>alert('신고가 완료되었습니다.'); window.close();</script>";
    }

    function articleget() {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $board = Board::withTrashed()->find(request()->id);   
        return view('admin/report_article')->with('board', $board);
    }

    function commentget() {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $comment = Comment::withTrashed()->find(request()->id);
        return view('admin/report_comment')->with('comment', $comment);
    }

    function userget() {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $user = User::withTrashed()->find(request()->id);
        if(strlen($user->user_profile) < 3) {
            $user->user_profile = 'profile.png';
        }
        return view('admin/report_user')->with('user', $user);
    }
}
