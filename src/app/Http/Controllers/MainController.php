<?php

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\FestivalHit;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // 0620 이가원 udt
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        // dump($result);
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

        // 0620 이가원 udt
        // if (isset(Auth::User()->user_id)) {
        //     $result_user = User::find(Auth::User()->user_id)->select(['user_email','user_nickname','user_profile'])->get();
        // }
        // else{
        //     $result_user=null;
        // }

        // $today = date('Y-m-d');
        // foreach ($result as $value) {
        //     $startDate[] = $value->festival_start_date;
        //     $endDate[] = $value->festival_end_date;
        // }
        // for ($i=0; $i < 4; $i++) {
        //     if ($today < $startDate[$i]) {
        //         $statusClass[$i] = 'btn-success';
        //         $statusText[$i] = '';
        //         $daysRemaining[$i] = date_diff(date_create($today), date_create($startDate[$i]))->format('%a');
        //         $statusText[$i] .= ' D-' . $daysRemaining[$i] . '';
        //     } elseif ($today > $endDate[$i]) {
        //         $statusClass[$i] = 'btn-secondary';
        //         $statusText[$i] = '진행종료';
        //     } else {
        //         $statusClass[$i] = 'btn-primary';
        //         $statusText[$i] = '진행중';
        //     }
        //     // $result[$i]=['test'=>'test1'];
        // }

        // foreach ($result as $val) {
        //     if ($today<$val->festival_start_date) {
        //         $val->statusClass='btn-success';
        //         $val->statusText='D - '.date_diff(date_create($today), date_create($val->festival_start_date))->format('%a');
        //     }
        //     elseif ($today>$val->festival_end_date) {
        //         $val->statusClass = 'btn-secondary';
        //         $val->statusText = '진행종료';
        //     }
        //     else {
        //         $val->statusClass = 'btn-primary';
        //         $val->statusText = '진행중';
        //     }
        // }
        // dump($result);
        // dump($statusClass);
        // dump($statusText);


        // $stat=['statusClass'=>$statusClass,'statusText'=>$statusText];
        // dump($stat);
        // return view('protoMain',compact('data'));
        // return view('main')->with('fesData',$result)->with('month',$month)->with('userData',$result_user);
        return view('main')->with('fesData',$result)->with('month',$month)->with('notice',$notice);
    }
    //  0620 이가원 del
    // 로그인 이후 메인 페이지 이동
    //$id = 로그인
    // public function mainUse($id)
    // {
    //     $result_fes=Festival::select([
    //         'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
    //     ])->where('festival_state','<','2')->orderBy('festival_hit')->limit(4)->get();
    //     // dump($data);
    //     $month=[];
    //     for ($i=0; $i < 13; $i++) {
    //         if ($i===0) {
    //             $month[]=null;
    //         }
    //         else{
    //             $month[]=$i;
    //         }
    //     }
    //     $result_user = User::find($id)->select(['user_email','user_nickname','user_profile'])->get();
    //     // return view('protoMain',compact('data'));
    //     return view('main')->with('fesData',$result_fes)->with('month',$month)->with('userData',$result_user);
    // }
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
        // $result = Festival::select(['festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'])
        // ->orderBy('festival_hit')->get();
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
    public function search(Request $val)
    {
        // $search_insert=new FestivalHit;
        // $search_insert->select_cnt=$val->search;
        // $search_insert->save();
        $val->validate(['search'=>'required|max:100']);
        if(isset($val->search)){
            FestivalHit::create(['select_cnt'=>$val->search]);
        }
        $result_search=DB::table('festivals')->where('festival_title','like','%'.$val->search.'%')->orderBy('festival_hit','desc')->get();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($result_search);
        $result_hot=DB::select('SELECT select_cnt, COUNT(select_cnt) cs FROM festival_hits WHERE hit_timer > NOW() GROUP BY(select_cnt)  ORDER BY cs DESC LIMIT 5');
        return view('search')->with('result',$result_search)->with('recommend',$result_hot)->with('search',$val->search);
    }
    //검색 추천 클릭
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
        // $result = Festival::select(['festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'])
        // ->where('area_code',$id)->orderBy('festival_hit')->get();
        // // dump($result);
        // return view('festival_list')->with('data',$result);
        //0621 김재성
        //축제 지역/월 별 출력
        //0626 김재성
        // $arr_temp[0]=$areaName;
        // $arr_temp[1]=$arr_temp[1]===""?"시기":sprintf('%02d',$arr_temp[1])."월";
        // $valInfo=['area'=>$arr_temp[0],'month'=>$arr_temp[1]];
        // dump($valInfo);
        // $arr_val=['area_code'=>$arr_temp[0],'month'=>Date("Y-".sprintf('%02d',$arr_temp[1])."-d",time())];
        // // var_dump($month);
        // // $fes_info=Festival::all();
        // // var_dump($arr_val);
        // if ($arr_temp[1]==="") {
        //     $arr_val['month']=DATE("Y-m-d",time());
        // }
        // // $fes_info=Festival::select([
        //     //     'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        //     // ])->where('area_code',$arr_val['area_code'])
        //     // ->where('festival_end_date','<',$arr_val['month'])
        //     // // ->where('festival_end_date','<',$month)
        //     // ->orderBy('festival_hit')->limit(4)->get();
        // $fes_temp=Festival::select([
        // 'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        // ])->where('festival_end_date','<',$arr_val['month']);
        // // ->where('festival_end_date','<',$month)
        // if ($arr_temp[0]!=="") {
        //     $fes_temp->where('area_code',$arr_val['area_code']);
        // }
        // $fes_info=$fes_temp->orderBy('festival_hit')->get();
        // dump($select_area);

        $festival = Festival::all();
        $mapUtil=new MapUtil;
        $mapUtil->areacodeTrans($festival);
    // dump($str_val);
        return view('festival_list')->with('data',$festival)->with('str',$str_val);
    }

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

        return view('festival_detail')
            ->with('festival', $festival[0]) // 축제 정보를 뷰로 전달
            ->with('favoriteCount', $favoriteCount) // 찜한 갯수를 뷰로 전달
            ->with('jjmFlg', $jjmFlg)
            ->with('fesid', $id); // 사용자의 찜 여부를 뷰로 전달합
        }
}
