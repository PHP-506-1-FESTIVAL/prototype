<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\FestivalHit;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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
        // dump($data);
        $month=[];
        for ($i=0; $i < 13; $i++) {
            if ($i===0) {
                $month[]=null;
            }
            else{
                $month[]=$i;
            }
        }
        // return view('protoMain',compact('data'));
        return view('main')->with('data',$result)->with('month',$month);

    }
    //로그인 클릭시
    public function Login()
    {
        return view('login');
    }
    //마이페이지
    //$id : 유저ID
    public function MyPage(Request $id)
    {
    # code...
    }
    //찜목록
    //$id : 유저ID
    public function MarkList(Request $id)
    {
        # code...
    }
    //로그아웃
    //$id : 유저ID
    public function Logout(Request $id)
    {
        # code...
    }
    //네비 축제목록 클릭
    public function fesList()
    {
        return view('festival_list');
    }
    //네비 자유게시판 클릭
    public function Border()
    {
        return view('boarder');
    }
    //네비 공지 클릭
    public function noticePage()
    {
        return view('Notice');
    }
    //공지알람 클릭시
    //$id : 공지ID
    public function NoticeDetail($id)
    {
        // $result=Notice::find($id);
        // if ($_SESSION) { TODO 조회수 중복 막기
        //     # code...
            // $result->notice_hit++;
            // $result->save();
        // }
        return view('Notice')->with('data',Notice::findOrFail($id));

    }
    //검색 직접입력
    //$id : 서치내용
    public function Search($val)
    {
        FestivalHit::create([
            "select_cnt" => $val
        ]);
        Festival::find();
    }
    //검색 추천 클릭
    //$id : 인기순위ID
    public function Recommend($id)
    {
        # code...
    }
    //축제 클릭시
    //$id : 축제 번호
    public function FesDetail($id)
    {

    }
    //지도 클릭시 ??TODO API인가
    //$arr_parm : mon(월)/local(지역코드)
    public function FesSelect($arr_parm)
    {
        # code...
    }
    //더보기 클릭시
    //$arr_parm : mon(월)/local(지역코드)
    public function FesOrder($arr_parm)
    {
        # code...
    }
    //공지
    public function Notice(Notice $id)
    {
        # code...
    }
    //축제정보
    public function Festival(Festival $id)
    {
        # code...
    }
    //인기순위
    //$val : 검색내용
    public function HotRecommend(FestivalHit $val)
    {
        # code...
    }
    //프로필
    public function Profile(User $id)
    {

    }
}
