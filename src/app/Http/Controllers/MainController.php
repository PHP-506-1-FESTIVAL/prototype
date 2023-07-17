<?php

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\FestivalHit;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth; // 0620 이가원 udt
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use App\Models\User;

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : MainController.php
 * 이력         : v001 0614 김재성 new
 ************************************************/

class MainController extends Controller
{
    //메인 페이지 이동
    public function main()
    {
        $result=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state','<','2')->orderBy('festival_hit')->limit(4)->get();
        $notice=Notice::all();
        $month=[];
        for ($i=0; $i < 13; $i++) {
            if ($i===0) {
                $month[]=null;
            }
            else{
                $month[]=$i;
            }
        }
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($result);
        $mapUtil->fesStat($result);

        return view('main')->with('fesData',$result)->with('month',$month)->with('notice',$notice);
    }
    //로그아웃
    //$id : 유저ID
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('main');
    }
    //네비 축제목록 클릭
    public function fesList()
    {
        $festival = Festival::all();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($festival);
        $mapUtil->fesStat($festival);
        return view('festival_list')->with('data',$festival);
    }
    //네비 자유게시판 클릭
    public function Border()
    {
        return view('boarder');
    }
    //네비 공지 클릭
    public function noticePage()
    {
        return view('notice_list');
    }
    //공지알람 클릭시
    //$id : 공지ID
    public function NoticeDetail($id)
    {
        return view('Notice')->with('data',Notice::findOrFail($id));
    }
    //검색 직접입력
    //$id : 서치내용
    public function search(Request $val)
    {
        $val->validate(['search'=>'required|max:100']);

        $result_search=DB::table('festivals')->where('festival_title','like','%'.$val->search.'%')->orderBy('festival_hit','desc')->get();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($result_search);
        $result_hot=DB::select('SELECT select_cnt, COUNT(select_cnt) cs FROM festival_hits WHERE hit_timer > NOW() GROUP BY(select_cnt)  ORDER BY cs DESC LIMIT 5');
        return view('search')->with('result',$result_search)->with('recommend',$result_hot)->with('search',$val->search);
    }
    public function searchGet()
    {
        $tempArr=[];
        $result_hot=DB::select('SELECT select_cnt, COUNT(select_cnt) cs FROM festival_hits WHERE hit_timer > NOW() GROUP BY(select_cnt)  ORDER BY cs DESC LIMIT 5');
        return view('search')->with('result',$tempArr)->with('recommend',$result_hot)->with('search',' ');
    }
    //검색 추천 클릭 /Todo 3차
    //$id : 인기순위ID
    public function Recommend($id)
    {
        # code...
    }
    //더보기 클릭시
    //$id : local(지역코드)
    //$arr_parm : mon(월)/local(지역코드) //월은 나중
    public function FesOrder(Request $str_val)
    {
        $festival = Festival::all();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($festival);
        return view('festival_list')->with('data',$festival)->with('str',$str_val);
    }
    //요청페이지 이동 /Todo3차
    public function fesRequest()
    {
        return view('festival_request');
    }
    /************************************************
     * 프로젝트명   : festival_info
     * 디렉토리     : Controllers
     * 파일명       : MainController.php
     * 이력         : v001 0614 박진영 new
     ************************************************/
    public function fesDetail($id)
    {
        $festival[0] = Festival::find($id);
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($festival);
        $mapUtil->fesStat($festival);
        $jjm = Favorite::where('festival_id', $id)->where('user_id', session()->get('user_id'))->get(); // 현재 사용자가 해당 축제를 찜했는지 확인
        $favoriteCount = Favorite::where('festival_id', $id)->count(); // 찜한 갯수
        $jjmFlg = [];
        if(isset($jjm[0])) {
            $jjmFlg = [$jjm[0]->favorite_id, $jjm[0]->user_id, $jjm[0]->festival_id];
        }
        $comments = Comment::where('festival_id', $id)
        ->join('users', 'comments.user_id', '=', 'users.user_id')
        ->select('comments.*', 'users.user_nickname', 'users.user_profile')
        ->orderBy('comments.updated_at', 'desc')
        ->get();


        return view('festival_detail')
            ->with('festival', $festival[0]) // 축제 정보를 뷰로 전달
            ->with('favoriteCount', $favoriteCount) // 찜한 갯수를 뷰로 전달
            ->with('jjmFlg', $jjmFlg)
            ->with('fesid', $id) // 사용자의 찜 여부를 뷰로 전달
            ->with('comments', $comments);
        }
}
