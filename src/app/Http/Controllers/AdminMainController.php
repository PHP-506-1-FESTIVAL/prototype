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

// area_code
// 1서울
// 2인천
// 3대전
// 4대구
// 5광주
// 6부산
// 7울산
// 8세종
// 31경기
// 32강원
// 33충북
// 34충남
// 35경북
// 36경남
// 37전북
// 38전남
// 39제주

class AdminMainController extends Controller
{
    // 메인 페이지 이동
    public function main() {
        // 로그인 체크(관리자 아이디만 접속 가능하고 나머지는 404error)
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }

        // 회원 all
        $userdata = User::all();
        $userdatacount = $userdata->count();
        $useralldatacount = DB::table('users')
        ->select('*')->count();
        
        // 축제 all
        $festivaldata = Festival::all();
        $festivaldatacount = $festivaldata->count();
        // 축제 인기순 TOP 10 (조회수 base) festivals festival_hits
        $festivaltop10 = DB::table('festivals')
        ->select('*')
        ->orderBy('festival_hit', 'DESC')
        ->get()
        ;

        // 게시글 all
        $board = Board::all();
        // 게시글 정렬
        // 한달전부터의 새글
        // SELECT * FROM boards WHERE created_at BETWEEN DATE_ADD(NOW(),INTERVAL -1 MONTH) AND NOW();
        $newboardmonth = DB::table('boards')
        ->select('*')
        ->where('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 MONTH)'))
        ->get()
        ->count()
        ;
        // 메인의 게시글 5개
        $boarddata = DB::table('boards')
        ->join('users', 'boards.user_id', '=', 'users.user_id' )
        ->select('*')
        ->where('boards.deleted_at', null)
        ->orderBy('boards.board_id', 'DESC')
        ->paginate(5);
        $boarddatacount = $board->count();

        // 신고관리
        $reportdata = DB::table('reports')
        ->select('*')
        ->where('deleted_at', null)
        ->orderBy('report_id', 'DESC')
        ->paginate(5);
        $reporthandle_flg0 = Report::where('handle_flg', null)->count();

        return view('admin/admin_main')
        ->with('userdatacount', $userdatacount)
        ->with('festivaldatacount', $festivaldatacount)
        ->with('festivaltop10', $festivaltop10)
        ->with('newboardmonth', $newboardmonth)
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
        
        $request->validate([
            'detail'     => 'max:500'
        ]);

        $userId = $request->input('user_id');
        $reason = $request->category;
        $reasondetail = $request->detail;

        // 유저 삭제 로직
        User::where('user_id', $userId)->delete();
        
        // 블랙리스트 테이블에 정보 저장 로직
        $blacklist = new Blacklist;
        $blacklist->admin_id = Auth::id();
        $blacklist->user_id = $userId;
        $blacklist->banned_at = now();
        $blacklist->blacklist_no = $reason;
        $blacklist->blacklist_detail = $reasondetail;

        // 필요한 다른 정보들을 설정합니다.
        $blacklist->save();

        return redirect()->route('admin.blacklist');
        
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
        // ->orderBy('users.created_at', 'desc') // {{-- ----- 230725 add 블랙리스트 정렬 변경(users.created_at -> blacklists.banned_at) 신유진 ----- --}}
        ->orderBy('blacklists.banned_at', 'desc') // {{-- ----- 230725 add 블랙리스트 정렬 변경(users.created_at -> blacklists.banned_at) 신유진 ----- --}}
        ->paginate(6);
        return view('admin.blacklist')->with('users', $users);
    }
}