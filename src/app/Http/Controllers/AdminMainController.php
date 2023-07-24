<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : AdminMainController
 * 파일명       : AdminMainController.php
 * 이력         : v002 0714 신유진 new
 ************************************************/

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Festival;
use App\Models\Report;
use App\Models\User;
use App\Models\Admin;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMainController extends Controller
{
    // 메인 페이지 이동
    public function main() {
        // 로그인 체크(관리자 아이디만 접속 가능하고 나머지는 404error)
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }

        // 메인 화면에 나올 data
        // $data = [];
        // 회원 all
        $userdata = User::all();
        $userdatacount = $userdata->count();
        $useralldatacount = DB::table('users')
        ->select('*')->count();
        

        // 축제 all
        $festivaldata = Festival::all();
        $festivaldatacount = $festivaldata->count();
        // 축제 인기순 TOP 10 (조회수 base) festivals festival_hits
        // $festivaltop10 = DB::table('festivals')
        // ->join('festival_hits', 'festivals.user_id', '=', 'festival_hits.user_id' )
        // ->select('*')
        // ->where('deleted_at', null)
        // ->orderBy('report_id', 'DESC')
        // ->paginate(5);
        // $reporthandle_flg0 = Report::where('handle_flg', null)->count();

        // 게시글 all
        $board = Board::all();
        // 메인의 게시글 5개
        $boarddata = DB::table('boards')
        ->join('users', 'boards.user_id', '=', 'users.user_id' )
        // ->select('boards.board_id', 'users.user_nickname', 'boards.board_title', 'boards.board_content', 'boards.created_at', 'boards.updated_at', 'boards.deleted_at', 'boards.board_hit')
        ->select('*')
        ->where('boards.deleted_at', null)
        ->orderBy('boards.board_id', 'DESC')
        ->paginate(5);
        $boarddatacount = $board->count();
        // 신고관리
        $report = Report::all();
        $reportdata = DB::table('reports')
        ->select('*')
        ->where('deleted_at', null)
        ->orderBy('report_id', 'DESC')
        ->paginate(5);
        $reporthandle_flg0 = Report::where('handle_flg', null)->count();

        // $data = [$userdatacount, $festivaldatacount, $boarddatacount];

        // 현재 시간 생성 ------------4차로 미룸
        // $nowdatetime = Carbon::now();
        // $reportcreatedate = $reportdata->created_at;
        // $reportdate = $nowdatetime - $reportcreatedate;
        // dump($nowdatetime);
        // dump($reportcreatedate);
        // dump($reportdate);

        return view('admin/admin_main')
        ->with('userdatacount', $userdatacount)
        ->with('festivaldatacount', $festivaldatacount)
        ->with('boarddata', $boarddata)
        ->with('boarddatacount', $boarddatacount)
        ->with('reporthandle_flg0', $reporthandle_flg0)
        ->with('reportdata', $reportdata)
        ->with('useralldatacount', $useralldatacount)
        ;
    }

    // 로그인
    public function login()
    {
        return view('admin.admin_login');
    }
    public function logout()
    {
        Session::flush(); // 세션 파기
        Auth::logout(); // 로그아웃
        return redirect()->route('admin.login');
    }

    public function loginpost(Request $req)
    {
        $admin = Admin::where('admin_email', $req->username)->first();

        if (!$admin || $req->password != $admin->admin_password) {
            $error = '아이디와 비밀번호를 확인해 주세요.';
            return redirect()->back()->with('error', $error);
        }
        Auth::login($admin);

        if (Auth::check()) {
            session($admin->only('admin_id', 'admin_email', 'admin_name')); // 세션에 인증된 회원 pk 등록
            return redirect()->intended(route('admin.main'));
        } else {
            $error = '인증 작업 에러';
            return redirect()->back()->with('error', $error);
        }
    }

    //유저관리
    public function userget(){
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $users = User::orderBy('created_at', 'desc')->paginate(10);
    
        foreach ($users as $user) {
            if (strlen($user->user_profile) < 3) {
                $user->user_profile = 'profile.png';
            }
        }
    
        return view('admin.user')->with('users', $users);
    }
    
    // 회원 탈퇴&블랙리스트 추가
    public function userpost(Request $request)
    {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        // dump($request);
        // exit;
        $userId = $request->input('user_id');
        $reason = $request->category;
        $request->validate([
            'detail'     => 'max:500'
        ]);

        // 유저 삭제 로직
        User::where('user_id', $userId)->delete();
        
        // 블랙리스트 테이블에 정보 저장 로직
        $blacklist = new Blacklist;
        $blacklist->admin_id = Auth::id();
        $blacklist->user_id = $userId;
        $blacklist->banned_at = now();
        $blacklist->blacklist_no = $reason;
        // 필요한 다른 정보들을 설정합니다.
        $blacklist->save();

        // if($request->type === '0') {
        //     $data['board_id'] = $request->no;
        // } else if($request->type === '1') {
        //     $data['comment_id'] = $request->no;
        // }

        // $data['user_id'] = $userId;
        // $data['admin_id'] = Auth::id();
        // $data['blacklist_no'] = $request->reason;
        // $data['blacklist_detail'] = $request->detail;
        // dump($data);
        // $blacklist = Blacklist::create($data);
        // $blacklist->save();

        return "<script>alert('블랙리스트 처리가 완료되었습니다.'); window.close();</script>";
        // return redirect()->back()->with('success', '유저가 블랙리스트로 처리되었습니다.');
    }

    // 유저 검색
    public function search(Request $request)
    {
        $query = $request->input('query');

        // 검색 로직을 구현하고 검색 결과를 가져옵니다.
        $users = User::where('user_name', 'like', '%' . $query . '%')
            ->orWhere('user_email', 'like', '%' . $query . '%')
            ->orWhere('user_nickname', 'like', '%' . $query . '%')
            ->orWhere('user_id', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.user')->with('users', $users);
    }

    // 블랙리스트 목록 가져오기
    public function blacklist()
    {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $users = DB::table('users')
        ->join('blacklists', 'blacklists.user_id', '=', 'users.user_id')
        // ->select('users.*')  {{-- ----- 230720 del 블랙리스트 사유 추가(users.* -> *) 신유진 ----- --}}
        ->select('*') // {{-- ----- 230720 add 블랙리스트 사유 추가(users.* -> *) 신유진 ----- --}}
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        return view('admin.blacklist')->with('users', $users);
    }
}