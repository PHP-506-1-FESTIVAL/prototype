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

class UserController extends Controller
{
    function login() {
        return view('login');
    }

    function loginpost(Request $req) {

        // 유효성 체크 (이메일: ~320글자 이메일 형식, 비밀번호: 8~24글자 숫자, 영어대소문자, 특수문자만 허용)
        $req->validate([
            'email'     => 'required|email|max:320'
            ,'password' => 'required|regex:/^[a-zA-Z\\d`~!@#$%^&*()-_=+]{8,24}$/'
        ]);

        // 유저정보 습득 (아직 비밀번호 해쉬화 안됨)
        $user = User::where('user_email', $req->email)->first();
        if(!$user || $req->password !== $user->user_password) {
            $error = '아이디와 비밀번호를 확인해 주세요.';
            return redirect()->back()->with('error', $error);
        }

        // 유저 인증작업
        Auth::login($user);
        if(Auth::check()) {
            session($user->only('user_id')); // 세션에 인증된 회원 pk 등록
            return redirect()->intended(route('main.use', ['id' => $user->user_id]));
        } else {
            $error = '인증작업 에러';
            return redirect()->back()->with('error', $error);
        }
    }

    function signup() {
        return view('signup');
    }

    function signuppost(Request $req) {
        
        // 유효성검사
        $req->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // 이미지 이름 설정
        $imgName = 'profileimg'.'.'.$req->image->extension();

        // 이미지가 저장될 path 설정
        $req->image->move(public_path('img/profile'), $imgName);

        return redirect()->route('user.login');
    }
}
