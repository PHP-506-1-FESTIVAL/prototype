<?php

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : UserController.php
 * 이력         : v001 0614 이가원 new
 ************************************************/

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    function signup() {
        return view('signup');
    }

    function signuppost(Request $req) {

        // 유효성검사
        $req->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data['user_email'] = $req->email;
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

        $user = User::create($data);
        
        if(!$user) {
            $error = '시스템 에러가 발생하여 회원가입에 실패했습니다.<br>잠시 후에 다시 시도해 주십시오.';
            return redirect()->route('users.registration')->with('error', $error);
        }

        // 이미지 이름 설정
        $imgName = $user->user_id.'.'.$req->image->extension();

        // 이미지가 저장될 path 설정
        $req->image->move(public_path('img/profile'), $imgName);

        $user2 = User::find($user->user_id);
        $user2->user_profile = $imgName;
        $user2->save();

        return redirect()->route('user.login');
    }

    function usermain() {

        // 로그인 체크
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }

        return view('usermain');
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
        $id = session('user_id');
        $user = User::find($id);
        $user->user_name = $req->name;
        $user->user_gender = $req->gender;
        $user->user_birthdate = $req->birthyear.'-'.$req->birthmonth.'-'.$req->birthday;
        $user->user_nickname = $req->nickname;
        $user->user_zipcode = $req->zipcode;
        $user->user_address = $req->address;
        $user->user_address_detail = $req->address2;

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

        return redirect()->route('user.main');
    }

    function pwchk() {
        return view('pwchk');
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
        return redirect()->intended(route('user.edit'));
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
        return redirect()->route('user.login');
    }

    function terms() {
        return view('terms');
    }

    function termspost(Request $req) {
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
        return redirect()->route('user.signup');
    }
}
