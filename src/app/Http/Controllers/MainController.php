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
use Illuminate\Support\Facades\Cookie;
use App\Models\Review;
use Carbon\Carbon;

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
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->orderBy('festival_end_date', 'desc')->limit(4);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->orderBy('festival_start_date', 'asc')->limit(4)->union($first);
        $result=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->orderBy('festival_start_date', 'desc')->limit(4)->union($second)->limit(4)->get();
        $notice=Notice::orderBy('notice_id', 'desc')->limit(3)->get();
        $month=[];
        for ($i=0; $i < 13; $i++) {
            if ($i===0) {
                $month[]=null;
            }
            else{
                $month[]=$i;
            }
        }
        $area = [
            'AC1' => '서울',
            'AC2' => '인천',
            'AC3' => '대전',
            'AC4' => '대구',
            'AC5' => '광주',
            'AC6' => '부산',
            'AC7' => '울산',
            'AC8' => '세종',
            'AC31' => '경기',
            'AC32' => '강원',
            'AC33' => '충북',
            'AC34' => '충남',
            'AC35' => '경북',
            'AC36' => '경남',
            'AC37' => '전북',
            'AC38' => '전남',
            'AC39' => '제주',
        ];
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($result);
        $mapUtil->fesStat($result);

        return view('main')->with('fesData',$result)->with('month',$month)->with('notice',$notice)->with('area', $area);
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
        // $festival = Festival::all();
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $festival=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
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

    public function search()
    {
        request()->validate(['search'=>'required|max:100']);
        if(isset(request()->search)){
            FestivalHit::create(['select_cnt'=>request()->search]);
        }
        $result_search=DB::table('festivals')->where('festival_title','like','%'.request()->search.'%')->orderBy('festival_start_date','desc')->paginate(10);
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($result_search);
        $result_hot=DB::select('SELECT select_cnt, COUNT(select_cnt) cs FROM festival_hits WHERE hit_timer > NOW() GROUP BY(select_cnt)  ORDER BY cs DESC LIMIT 5');
        return view('search')->with('result',$result_search)->with('recommend',$result_hot)->with('search',request()->search);
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
        // $festival = Festival::all();
        $first=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '2')->orderBy('festival_end_date', 'desc')->limit(1000);
        $second=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '1')->orderBy('festival_start_date', 'asc')->limit(1000)->union($first);
        $festival=Festival::select([
            'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_state', '0')->orderBy('festival_start_date', 'desc')->limit(1000)->union($second)->get();
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
     *                v002 0720 신유진 add 152-160 조회수 추가
     ************************************************/
    public function fesDetail($id)
    {
        // {{-- ----- 230720 add 조회수 추가 신유진 ----- --}}
        $cookieName = 'festhit' . $id;
        $hitsTime = now()->addMinutes(3); // 조회수 쿨타임 설정
        if (!Cookie::has($cookieName)) {
            $festhit = Festival::find($id);
            $festhit->festival_hit++;
            Cookie::queue($cookieName, true, $hitsTime->timestamp);
            $festhit->save();
        }
         // {{-- ----- end 230720 조회수 추가 신유진 ----- --}}
        $festival[0] = Festival::find($id);
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($festival);
        $mapUtil->fesStat($festival);
        $jjm = Favorite::where('festival_id', $id)->where('user_id', session('user_id'))->get(); // 현재 사용자가 해당 축제를 찜했는지 확인
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

        $reviews = DB::table('reviews')
        ->join('users', 'users.user_id', '=', 'reviews.user_id')
        ->select('reviews.*', 'users.user_nickname', 'users.user_profile')
        ->where('reviews.festival_id', $id)
        ->whereNull('reviews.deleted_at') // Exclude deleted reviews
        ->orderBy('reviews.updated_at', 'desc')
        ->get();

        foreach ($reviews as $review) {
            $review->created_at = Carbon::parse($review->created_at); // created_at 컬럼을 Carbon 객체로 변환
            $review->updated_at = Carbon::parse($review->updated_at); // updated_at 컬럼을 Carbon 객체로 변환
        }

        $data = Review::where('festival_id',$id)->get();

        $sum_rate=0;
        $count_rate=0;
        $star=0;
        foreach ($data as $val) {
            $sum_rate+=$val->rate;
            $count_rate++;
        }
        if ($count_rate!==0) {
            $star_percentage=floor($sum_rate/$count_rate*20);
            $star=round($sum_rate/$count_rate,1);
        }else{
            $star_percentage=0;
        }
        $num_data=[
            "count"=>$count_rate,
            "star_percentage"=>$star_percentage,
            "star"=>$star
        ];
        return view('festival_detail')
            ->with('festival', $festival[0]) // 축제 정보를 뷰로 전달
            ->with('favoriteCount', $favoriteCount) // 찜한 갯수를 뷰로 전달
            ->with('jjmFlg', $jjmFlg)
            ->with('fesid', $id) // 사용자의 찜 여부를 뷰로 전달
            ->with('comments', $comments)
            ->with('reviews', $reviews)
            ->with('data',$data)
            ->with('num_data',$num_data);
        }
}
