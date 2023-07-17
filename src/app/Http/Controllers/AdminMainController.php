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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMainController extends Controller
{
    // 메인 페이지 이동
    public function main() {
        // 로그인 체크(관리자 아이디만 접속 가능하고 나머지는 404error)


        // 메인 화면에 나올 data
        $data = [];
        // 회원 all
        $userdata = User::all();
        $userdatacount = $userdata->count();
        // 축제 all
        $festivaldata = Festival::all();
        $festivaldatacount = $festivaldata->count();
        // 게시글 all
        $boarddata = Board::all();
        // $boards = DB::table('boards')
        // ->join('users', 'boards.user_id', '=', 'users.user_id' )
        // ->select('*')
        // ->where('boards.board_id', $board_id)->get();
        $boarddatacount = $boarddata->count();

        $data = [$userdatacount, $festivaldatacount, $boarddatacount];

        $reportdata = Report::all();

        return view('admin/admin_main')
        ->with('userdatacount', $userdatacount)
        ->with('festivaldatacount', $festivaldatacount)
        ->with('boarddatacount', $boarddatacount)
        ->with('data', $data)
        ->with('reportdata', $reportdata)
        ;
    }

    // 회원
    // 축제
    // 게시글
    // 축제 요청
    // 신고 관리
    // 인기 지역
    // 인기 축제
}
