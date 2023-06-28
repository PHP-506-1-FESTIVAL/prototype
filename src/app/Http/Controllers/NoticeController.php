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
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    private $Notice;

// 공지 메인 페이지 (3차수정목록_중요한(많이 문의 오는 질문 ex_비밀번호 찾는방법, 이번달 블랙리스트 목록 등등)공지 먼저 뜨게 하기)
    public function index()
    {
        // $notices = Notice::all();
        $notices = DB::table('notices')
        ->select('*')
        ->where('deleted_at', null)
        ->orderBy('notice_id', 'DESC')
        ->paginate(10);

        // return view('notice_list', compact('notices'));
        // return view('notice_list', ['notices' => $notices]);
        return view('notice_list')->with('notices', $notices);
    }

// 공지 상세 페이지
    public function show($notice_id)
    {
        $notices = Notice::find($notice_id);
        $notices->notice_hit++;
        $notices->save();
        return view('notice_detail')->with('notices', Notice::findOrFail($notice_id))->with('notices', $notices);
    }

    //공지 검색 페이지
    public function search(Request $val)
    {
        $val->validate(['search'=>'required|max:100']);
        // dump($val);
        $result_search=DB::table('notices')
        ->select('*')->where('deleted_at', null)
        ->where(function ($query) use ($val) {
            $query->where('notice_title','like','%'.$val->search.'%') // 제목에 검색내용이 포함된경우
            ->orWhere('notice_content','like','%'.$val->search.'%'); // 보드내용에 검색내용이 포함된경우
        })->paginate(10);
        // dump($result_search);
        return view('notice_list')->with('notices',$result_search);
    }
}

