<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v001 0626 신유진 new
 ************************************************/


namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // [댓글 출력]
    // public function index($board_id)
    // {
    //     $data = DB::table('comments')
    //     ->select('*')
    //     ->where('board_id', $board_id)
    //     ->orderBy('boards.board_id', 'DESC');

    //     return view('board_list', ['data' => $data]);
    // }
    public function show(Board $board_id){
        $boards = Board::all()->sortByDesc('id')->take(10);
        $parentID = $board -> id;
        $comment = DB::table('comments')->where('parent_id', '=', $parentID)->get();
        return view('boards.show', compact(['board', 'boards', 'comment']));
    }

    // [댓글 작성]
    public function create()
    {
        // 로그인 체크(로그인 안된상태면 접근 못하게)
        // -----------------------------------------로그인후 글작성페이지로 이동하도록 고쳐주세요
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }

        return view('board_write');
    }

}
