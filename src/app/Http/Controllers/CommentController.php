<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v001 0626 신유진 new
 *                     0628 신유진 del
 ************************************************/


namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class CommentController extends Controller
// {
//     // [댓글 출력]
//     // public function index($board_id)
//     // {
//     //     $data = DB::table('comments')
//     //     ->select('*')
//     //     ->where('board_id', $board_id)
//     //     ->orderBy('boards.board_id', 'DESC');

//     //     return view('board_list', ['data' => $data]);
//     // }
//     public function show(Board $board_id){
//         $boards = Board::all()->sortByDesc('id')->take(10);
//         $parentID = $board -> id;
//         $comment = DB::table('comments')->where('parent_id', '=', $parentID)->get();
//         return view('boards.show', compact(['board', 'boards', 'comment']));
//     }

//     // [댓글 작성]
//     public function create()
//     {
//         // 로그인 체크(로그인 안된상태면 접근 못하게)
//         // -----------------------------------------로그인후 글작성페이지로 이동하도록 고쳐주세요
//         if(auth()->guest()) {
//             return redirect()->route('user.login');
//         }

//         return view('board_write');
//     }

// }
댓글테이블	comments

댓글번호 		comment_id- pk
축제번호 		festival_id
글 번호		board_id
댓글작성자번호	user_id
게시판 분류	commnet_type	0(상세) 1(자유)
댓글내용		commnet_content	
작성일		created_at
수정일		updated_at
삭제일		deleted_at

10155
<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v001 0626 신유진 new
 *                     0628 신유진 del
 ************************************************/

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// class CommentController extends Controller
// {
//     // [댓글 출력]
//     // public function index($board_id)
//     // {
//     //     $data = DB::table('comments')
//     //     ->select('*')
//     //     ->where('board_id', $board_id)
//     //     ->orderBy('boards.board_id', 'DESC');

//     //     return view('board_list', ['data' => $data]);
//     // }
    // public function show(Board $board_id){
    //     $boards = Board::all()->sortByDesc('id')->take(10);
    //     $parentID = $board -> id;
    //     $comment = DB::table('comments')->where('parent_id', '=', $parentID)->get();
    //     return view('boards.show', compact(['board', 'boards', 'comment']));
    // }

//     // [댓글 작성]
//     public function create()
//     {
//         // 로그인 체크(로그인 안된상태면 접근 못하게)
//         // -----------------------------------------로그인후 글작성페이지로 이동하도록 고쳐주세요
//         if(auth()->guest()) {
//             return redirect()->route('user.login');
//         }

//         return view('board_write');
//     }

// }

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v002 0714 박진영 new
 *                     
 ************************************************/
class CommentController extends Controller
{
    public function index($board_id)
    {
    $data = DB::table('comments')
    ->select('*')
    ->where('board_id', $board_id)
    ->orderBy('boards.board_id', 'DESC');

    return view('board_list', ['data' => $data]);
    }
    public function create(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->comment_type = $request->input('type_flg', 0); // type_flg 필드의 값을 가져옴, 기본값은 0
        $comment->comment_content = $request->input('comment_content');
        $comment->festival_id = $request->input('festival_id');
        $comment->board_id = $request->input('board_id');
        $comment->save();

        return redirect();
    }

    public function update(Request $request, $comment_id)
    {
        $comment = Comment::find($comment_id);
        if (!$comment) {
            return redirect()->back()->with('error', '댓글을 찾을 수 없습니다.');
        }

        $comment->comment_content = $request->input('comment_content');
        $comment->save();

        return redirect()->back()->with('notice', '댓글이 수정되었습니다.');
    }

    public function show($board_id)
    {
        $data = Comment::select('comment_id', 'board_id', 'comment_type', 'comment_content', 'created_at')
                ->where('user_id', session('user_id'))
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('comments')->with('data', $data);
    }

    public function delete($comment_id)
    {
        $comment = Comment::find($comment_id);
        if (!$comment) {
            return redirect()->back()->with('error', '댓글을 찾을 수 없습니다.');
        }

        $comment->delete();

        return redirect()->back()->with('notice', '댓글이 삭제되었습니다.');
    }
    
}
