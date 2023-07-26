<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v001 0626 신유진 new
 *                     0628 신유진 del
 ************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : CommentController.php
 * 이력         : v002 0714 박진영 new
 *                     
 ************************************************/
class CommentController extends Controller
{
    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->comment_type = $request->input('type_flg', 0); // 상세페이지0, 자유게시판1
        $comment->comment_content = $request->input('comment_content');
        $comment->festival_id = $request->input('festival_id');
        $comment->board_id = $request->input('board_id');
        $comment->save();

        return redirect()->back()->with('comment', $comment);
    }

    public function delete($id)
    {
    $comment = Comment::findOrFail($id);
    $comment->delete();

    return redirect()->back()->with('success', '댓글이 삭제되었습니다.');
    }
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $comment->comment_content = $request->input('comment_content');
        $comment->save();

        return redirect()->back()->with('success', '댓글이 수정되었습니다');
    }
}
