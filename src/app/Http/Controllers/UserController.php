<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : UserController.php
 * 이력         : v001 0614 이가원 new
 ************************************************/

namespace App\Http\Controllers;

use App\Lib\MapUtil;
use App\Models\Board;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Festival;
use App\Models\RegistToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    function login() {
        return view('login');
    }

    function loginpost(Request $req) {

        // 유효성 체크 (이메일: ~320글자 이메일 형식, 비밀번호: 8~24글자 숫자, 영어대소문자, 특수문자만 허용)
        $req->validate([
            'email'     => 'required|email|max:320'
            ,'password' => 'required|regex:/^[a-zA-Z\\d`~!@#$%^&*()-_=+]{4,20}$/'
        ]);

        // 유저정보 습득
        $user = User::where('user_email', $req->email)->first();
        if(!$user || !(Hash::check($req->password, $user->user_password))) {
            $error = '아이디와 비밀번호를 확인해 주세요.';
            return redirect()->back()->with('error', $error);
        }

        // 유저 인증작업
        Auth::login($user);
        if(Auth::check()) {
            if(strlen($user->user_profile) < 3) {
                $user->user_profile = 'profile.png';
            }
            session($user->only('user_id', 'user_email', 'user_nickname', 'user_profile')); // 세션에 인증된 회원 pk 등록
            return redirect()->intended(route('main'));
        } else {
            $error = '인증작업 에러';
            return redirect()->back()->with('error', $error);
        }
    }

    function logout() {
        Session::flush(); // 세션 파기
        Auth::logout(); // 로그아웃
        return redirect()->route('user.login');
    }

    function usermain() {

        // 로그인 체크
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }

        $fav = Favorite::where('user_id', session('user_id'))->get();
        $favcount = $fav->count();
        $board = Board::where('user_id', session('user_id'))->get();
        $board2 = Board::where('user_id', session('user_id'))->limit(3)->orderBy('created_at', 'desc')->get();
        $boardcount = $board->count();
        $comment = Comment::where('user_id', session('user_id'))->get();
        $comment2 = Comment::where('user_id', session('user_id'))->limit(3)->orderBy('created_at', 'desc')->get();
        $commentcount = $comment->count();
        $data = [];
        $data = [$favcount, $boardcount, $commentcount];

        return view('usermain')->with('data', $data)->with('board', $board2)->with('comment', $comment2);
    }

    function useredit() {
        $id = session('user_id');
        $user = User::find($id);

        if($user->user_gender === '0') {
            $user->malechk = 'checked';
            $user->femalechk = '';
        } else {
            $user->malechk = '';
            $user->femalechk = 'checked';
        }

        if($user->user_marketing_agreement === '1') {
            $user->marketingchk = 'checked';
        } else {
            $user->marketingchk = '';
        }

        if($user->user_email_agreement === '1') {
            $user->promotionchk = 'checked';
        } else {
            $user->promotionchk = '';
        }

        $user->birthyear = substr($user->user_birthdate, 0, 4);
        $user->birthmonth = substr($user->user_birthdate, 5, 2);
        $user->birthday = substr($user->user_birthdate, 8, 2);

        return view('useredit')->with('data', $user);
    }

    function update(Request $req) {

        // 유효성검사
        $req->validate([
            'name' => 'required'
            ,'gender' => 'required'
            ,'birthyear' => 'required'
            ,'birthmonth' => 'required'
            ,'birthday' => 'required'
            ,'nickname' => 'required'
            ,'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $id = session('user_id');
        $user = User::find($id);
        $user->user_name = $req->name;
        $user->user_gender = $req->gender;
        $user->user_birthdate = $req->birthyear.'-'.$req->birthmonth.'-'.$req->birthday;
        $user->user_nickname = $req->nickname;
        $user->user_zipcode = $req->zipcode;
        $user->user_address = $req->address;
        $user->user_address_detail = $req->address2;

        if($req->password) {
            $req->validate([
                'password' => 'regex:/(?=.*\d{1,20})(?=.*[~`!@#$%\^&*()-+=]{1,20})(?=.*[a-zA-Z]{2,20}).{8,20}$/'
            ]);
            if(Hash::check($req->password, $user->user_password)) {
                $alert = '변경하실 비밀번호가 기존 비밀번호와 같습니다.';
                return redirect()->back()->with('alert', $alert);
            }
            $user->user_password = Hash::make($req->password);
        }

        if($req->image) {
            $imgName = $user->user_id.'.'.$req->image->extension();

            // 이미지가 저장될 path 설정
            $req->image->move(public_path('img/profile'), $imgName);

            // 이미지 이름 설정
            $user2 = User::find($user->user_id);
            $user2->user_profile = $imgName;
            $user2->save();
        }

        if(!$req->marketing) {
            $user->user_marketing_agreement = '0';
        } else {
            $user->user_marketing_agreement = '1';
        }

        if(!$req->promotion) {
            $user->user_email_agreement = '0';
        } else {
            $user->user_email_agreement = '1';
        }

        $user->save();

        if(strlen($user->user_profile) < 3) {
            $user->user_profile = 'profile.png';
        }
        session($user->only('user_id', 'user_email', 'user_nickname', 'user_profile'));

        return redirect()->route('user.main');
    }

    function pwchk($id) {
        if (session('kakao_flg')==='1') {
            session()->put('pwchk_flg', '1');
            return redirect()->route('user.edit');
        }
        return view('pwchk')->with('chkflg', $id);
    }

    function pwchkpost(Request $req) {
        // 유효성 체크 (이메일: ~320글자 이메일 형식, 비밀번호: 8~24글자 숫자, 영어대소문자, 특수문자만 허용)
        $req->validate([
            'password' => 'required|regex:/^[a-zA-Z\\d`~!@#$%^&*()-_=+]{4,20}$/'
        ]);

        // 유저정보 습득, 비밀번호 체크
        $user = User::where('user_email', session('user_email'))->first();
        if(!$user || !(Hash::check($req->password, $user->user_password))) {
            $error = '비밀번호를 다시 확인해 주세요.';
            return redirect()->back()->with('error', $error);
        }

        session()->put('pwchk_flg', '1'); // 세션에 플래그 등록

        if ($req->chkflg === '1') {
            return redirect()->route('user.withdraw');
        } else {
            return redirect()->route('user.edit');
        }
    }

    function withdraw() {

        return view('withdraw');
    }

    function withdrawpost(Request $req) {
        $id = session('user_id');
        $user = User::find($id);
        $user->wr_id = $req->wr;
        $user->save();
        $result = User::destroy($id);
        Session::flush();
        Auth::logout(); // 에러처리(laravel error handling) 2차프로젝트에서 작성

        session()->put('withdraw_flg', '1');
        return redirect()->route('user.login');
    }

    function favorites() {
        $data = DB::table('favorites')
                        ->join('festivals', 'favorites.festival_id', '=', 'festivals.festival_id' )
                        ->select('favorites.favorite_id', 'festivals.festival_id', 'festivals.festival_title', 'festivals.festival_start_date', 'festivals.festival_end_date', 'festivals.poster_img', 'festivals.area_code')
                        ->where('favorites.user_id', session('user_id'))
                        ->orderBy('festivals.festival_start_date', 'desc')
                        ->paginate(5);
        $area = new MapUtil;
        $area->areacodeTrans($data);

        return view('favorites')->with('data', $data);
    }

    function articles() {
        $data = Board::select('board_id', 'board_title', 'created_at', 'board_hit')
                ->where('user_id', session('user_id'))
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('articles')->with('data', $data);
    }

    function comments() {
        $data = Comment::select('comment_id', 'board_id', 'comment_type', 'comment_content', 'created_at')
                ->where('user_id', session('user_id'))
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('comments')->with('data', $data);
    }
        /************************************************
     * 프로젝트명   : festival_info
     * 디렉토리     : UserController
     * 파일명       : web.php
     * 이력         : v002 0717 김재성 new
     ************************************************/

    function termspost(Request $req) {
        $req->validate([
            'termsagree'=>'required|regex:/([1])/',
            'privacyagree'=>'required|regex:/([1])/'
        ]);

        if(!$req->marketing) {
            session()->put('marketing', '0');
        } else {
            session()->put('marketing', '1');
        }

        if(!$req->promotion) {
            session()->put('promotion', '0');
        } else {
            session()->put('promotion', '1');
        }

        session()->put('termsagree', $req->termsagree);
        session()->put('privacyagree', $req->privacyagree);
        session()->put('send_mail', $req->send_mail);
        return redirect()->route('user.signup');
    }

    function signup() {

        return view('signup');
    }

    function signuppost(Request $req) {

        // 유효성검사
        $req->validate([
            'password' => 'required|regex:/(?=.*\d{1,20})(?=.*[~`!@#$%\^&*()-+=]{1,20})(?=.*[a-zA-Z]{2,20}).{8,20}$/'
            ,'name' => 'required'
            ,'gender' => 'required'
            ,'birthyear' => 'required'
            ,'birthmonth' => 'required'
            ,'birthday' => 'required'
            ,'nickname' => 'required'
            ,'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data['user_email'] = session()->get('send_mail');
        $data['user_password'] = Hash::make($req->password);
        $data['user_name'] = $req->name;
        $data['user_gender'] = $req->gender;
        $data['user_birthdate'] = $req->birthyear.'-'.$req->birthmonth.'-'.$req->birthday;
        $data['user_nickname'] = $req->nickname;
        $data['user_zipcode'] = $req->zipcode;
        $data['user_address'] = $req->address;
        $data['user_address_detail'] = $req->address2;
        $data['user_marketing_agreement'] = session()->get('marketing');
        $data['user_email_agreement'] = session()->get('promotion');
        $data['termsagree'] = session()->get('termsagree');
        $data['privacyagree'] = session()->get('privacyagree');

        $user = User::create($data);

        if(!$user) {
            $error = '시스템 에러가 발생하여 회원가입에 실패했습니다.<br>잠시 후에 다시 시도해 주십시오.';
            return redirect()->route('user.signup')->with('error', $error);
        }

        if($req->image) {
            $imgName = $user->user_id.'.'.$req->image->extension();

            // 이미지가 저장될 path 설정
            $req->image->move(public_path('img/profile'), $imgName);

            // 이미지 이름 설정
            $user2 = User::find($user->user_id);
            $user2->user_profile = $imgName;
            $user2->save();
        }
        $token=RegistToken::where('send_mail', session()->get('send_mail'))->where('mail_flg','0')->first();
        $token->send_timer=Carbon::now()->toDateTimeString();
        $token->save();

        session()->put('signup_flg', '1');

        return redirect()->route('user.login');
    }
    function pwChang(Request $req) {

        $user=User::where('user_email',$req->email)->first();
        $token=RegistToken::where('send_mail',$req->email)->where('mail_flg','1')->where('mail_token',$req->token)->first();

        if($req->password) {
            $req->validate([
                'password' => 'same:pwchk|regex:/(?=.*\d{1,20})(?=.*[~`!@#$%\^&*()-+=]{1,20})(?=.*[a-zA-Z]{2,20}).{8,20}$/'
            ]);
            if(Hash::check($req->password, $user->user_password)) {
                $error = '변경하실 비밀번호가 기존 비밀번호와 같습니다.';
                return redirect()->back()->with('error', $error);
            }
            $user->user_password = Hash::make($req->password);
            $token->send_timer=Carbon::now()->toDateTimeString();
        }

        $user->save();
        $token->save();


        session()->put('pwChang_flg', '1');
        return redirect()->route('user.login');
    }
    public function adminupdate(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $request->validate([
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_gender' => 'required|in:0,1',
            'user_birthdate' => 'nullable|date',
            'user_nickname' => 'required|string',
            'user_address' => 'nullable|string',
            'user_address_detail' => 'nullable|string',
            'user_zipcode' => 'nullable|string',
            'user_marketing_agreement' => 'nullable|in:0,1',
            'user_email_agreement' => 'nullable|in:0,1',
        ]);

        $user->update([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'user_gender' => $request->input('user_gender'),
            'user_birthdate' => $request->input('user_birthdate'),
            'user_nickname' => $request->input('user_nickname'),
            'user_address' => $request->input('user_address'),
            'user_address_detail' => $request->input('user_address_detail'),
            'user_zipcode' => $request->input('user_zipcode'),
            'user_marketing_agreement' => $request->input('user_marketing_agreement'),
            'user_email_agreement' => $request->input('user_email_agreement'),
        ]);

        return back()->with('성공', '수정 성공');
    }

}

