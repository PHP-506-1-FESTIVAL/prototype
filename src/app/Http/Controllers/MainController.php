<?php

namespace App\Http\Controllers;

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
        // dump($data);
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

        // 0620 이가원 udt
        // if (isset(Auth::User()->user_id)) {
        //     $result_user = User::find(Auth::User()->user_id)->select(['user_email','user_nickname','user_profile'])->get();
        // }
        // else{
        //     $result_user=null;
        // }

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
        foreach ($festival as $value) {
        switch ($value->area_code) {
            case "1":
                $areaName = '서울';
                break;
            case "2":
                $areaName = '인천';
                break;
            case "3":
                $areaName = '대전';
                break;
            case "4":
                $areaName = '대구';
                break;
            case "5":
                $areaName = '광주';
                break;
            case 6:
                $areaName = '부산';
                break;
            case 7:
                $areaName = '울산';
                break;
            case 8:
                $areaName = '세종';
                break;
            case 31:
                $areaName = '경기';
                break;
            case 32:
                $areaName = '강원';
                break;
            case 33:
                $areaName = '충북';
                break;
            case 34:
                $areaName = '충남';
                break;
            case 35:
                $areaName = '경북';
                break;
            case 36:
                $areaName = '경남';
                break;
            case 37:
                $areaName = '전북';
                break;
            case 38:
                $areaName = '전남';
                break;
            case 39:
                $areaName = '제주';
                break;
            default:
                $areaName = 'Unknown';
        }
        $value->area_code=$areaName;
    }
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
    public function FesOrder($str_val)
    {
        // $result = Festival::select(['festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'])
        // ->where('area_code',$id)->orderBy('festival_hit')->get();
        // // dump($result);
        // return view('festival_list')->with('data',$result);
        //0621 김재성
        //축제 지역/월 별 출력
        $arr_temp=explode(',',$str_val);
        // var_dump($arr_temp);
        $arr_val=['area_code'=>$arr_temp[0],'month'=>Date("Y-".sprintf('%02d',$arr_temp[1])."-d",time())];
        // var_dump($month);
        // $fes_info=Festival::all();
        // var_dump($arr_val);
        if ($arr_temp[1]==="") {
            $arr_val['month']=DATE("Y-m-d",time());
        }
        // $fes_info=Festival::select([
            //     'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
            // ])->where('area_code',$arr_val['area_code'])
            // ->where('festival_end_date','<',$arr_val['month'])
            // // ->where('festival_end_date','<',$month)
            // ->orderBy('festival_hit')->limit(4)->get();
        $fes_temp=Festival::select([
        'festival_id','festival_title', 'festival_start_date', 'festival_end_date', 'area_code', 'poster_img', 'festival_hit', 'festival_state'
        ])->where('festival_end_date','<',$arr_val['month']);
        // ->where('festival_end_date','<',$month)
        if ($arr_temp[0]!=="") {
            $fes_temp->where('area_code',$arr_val['area_code']);
        }
        $fes_info=$fes_temp->orderBy('festival_hit')->get();

        return view('festival_list')->with('data',$fes_info);
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
        $festival = Festival::find($id);
        switch ($festival->area_code) {
            case "1":
                $areaName = '서울';
                break;
            case "2":
                $areaName = '인천';
                break;
            case "3":
                $areaName = '대전';
                break;
            case "4":
                $areaName = '대구';
                break;
            case "5":
                $areaName = '광주';
                break;
            case 6:
                $areaName = '부산';
                break;
            case 7:
                $areaName = '울산';
                break;
            case 8:
                $areaName = '세종';
                break;
            case 31:
                $areaName = '경기';
                break;
            case 32:
                $areaName = '강원';
                break;
            case 33:
                $areaName = '충북';
                break;
            case 34:
                $areaName = '충남';
                break;
            case 35:
                $areaName = '경북';
                break;
            case 36:
                $areaName = '경남';
                break;
            case 37:
                $areaName = '전북';
                break;
            case 38:
                $areaName = '전남';
                break;
            case 39:
                $areaName = '제주';
                break;
            default:
                $areaName = 'Unknown';
        }
        $festival->area_code=$areaName;
        // $jjmCount = Favorite::all()->where('festival_id',$id)->count('festival_id');
        $jjmFlg = Favorite::select('favorite_id')->where('festival_id',$id)->where('user_id',session()->get('user_id'))->get();
        // dump($jjmFlg);
        return view('festival_detail')->with('festival',$festival)->with('jjmFlg',$jjmFlg);
    }
}
