<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : NoticeController.php
 * 이력         : v001 0620 신유진 new
 ************************************************/

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

// class NoticeController extends Controller
// {
//     private $Notice;

//     // 공지사항 메인 페이지
//     public function index()
//     {
//         // laravel 페이징 사용
//         // ->get() 대신, ->paginate(한페이지에 보여줄 글 갯수)를 사용
//         // 1. board_id / DESC 페이징
//         // $notices = Notice::select(['board_id', 'user_id', 'board_title', 'board_content', 'created_at', 'updated_at', 'deleted_at', 'board_hit'])->orderBy('board_id', 'DESC');
//         // 2. latest() 페이징
//         $notice = $this->Notice->latest();
        
//         // return view('뷰파일 이름', compact('보내줄 변수명')); 
//         return view('notice_list', compact('notice'));
//     }

// }

class NoticeController extends Controller
{
    private $Notice;

// 공지 메인 페이지 (3차수정목록_중요한(많이 문의 오는 질문 ex_비밀번호 찾는방법, 이번달 블랙리스트 목록 등등)공지 먼저 뜨게 하기)
    public function index()
    {
        $notices = Notice::all();

        // return view('notice_list', compact('notices'));
        return view('notice_list', ['notices' => $notices]);
    }

// 공지 상세 페이지
    public function show($notice_id)
    {
        $notice_detail_data = Notice::find($notice_id);
        return view('notice_detail')->with('notice_detail_data', Notice::findOrFail($notice_id));
    }
}

