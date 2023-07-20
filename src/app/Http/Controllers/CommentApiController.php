<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function boardComment($board_id)
    {
        // dump($id);
        // exit;
        $comment=Comment::where('board_id',$board_id)->get();
        return $comment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req,$board_id)
    {
        // dump($req);
        // exit;
        $comment=new Comment;
        $comment->board_id=$board_id;
        $comment->user_id=$req->user;
        $comment->comment_content=$req->content;
        $comment->comment_type='1';
        $comment->save();
        return 'Success!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $comment_id)
    {
        $comment=Comment::find($comment_id);
        $comment->comment_content=$req->content;
        $comment->save();

        return 'Success!!!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment=Comment::find($comment_id);
        $comment->delete();

        return 'Success!!!!';
    }
}
