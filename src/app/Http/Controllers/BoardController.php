<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : BoardController.php
 * 이력         : v001 0613 신유진 new
 ************************************************/

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    private $Board;

    public function __construct(Board $Board){
        // Laravel 의 IOC(Inversion of Control)
        // 이렇게 모델을 가져오는 것이 추천 코드
        $this->Board = $Board;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 게시판 메인 페이지
    public function index()
    {
        // laravel 페이징 사용
        // ->get() 대신, ->paginate(한페이지에 보여줄 글 갯수)를 사용
        // 1. board_id / DESC 페이징
        $data = Board::select(['board_id', 'user_id', 'board_title', 'board_content', 'created_at', 'updated_at', 'deleted_at', 'board_hit'])->orderBy('board_id', 'DESC')->paginate(10);
        // 2. latest() 페이징
        // $data = $this->Board->latest()->paginate(10);
        
        // return view('뷰파일 이름', compact('보내줄 변수명')); 
        return view('board_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 작성 페이지
    public function create()
    {
        // 로그인 체크(로그인 안된상태면 접근 못하게)
        // if(auth()->guest()) {
            // return redirect()->route('user.login');
        // }
        return view('board_write');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 상세 페이지
    public function show($board_id){
        $board_detail_data = Board::find($board_id);
        return view('board_detail')->with('board_detail_data', Board::findOrFail($board_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 수정 페이지
    public function edit($board_id)
    {
        // 로그인 체크(로그인 안된상태면 접근 못하게)
        // if(auth()->guest()) {
            // return redirect()->route('user.login');
        // }
        $board_edit_data = Board::find($board_id);
        return view('board_edit')->with('board_edit_data', Board::findOrFail($board_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 수정내용 등록
    public function update($board_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 글 삭제
    public function destroy($board_id)
    {
        // board_id에 해당하는 board를 destroy(ctrl+클릭해보기)
        // destory()는 파라미터를 PK(id)를 받아야함
        Board::destroy($board_id);
        return redirect('/board');
    }
}
