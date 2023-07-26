<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('kakao')->redirect();
    }
    public function back()
    {
        $kakao = Socialite::driver('kakao')->stateless()->user();
        $userChk=User::where('user_email',$kakao->email)->first();
        if (!$userChk) {
            $userMake=new User;

            $userMake->user_email=$kakao->email;
            $userMake->user_name=$kakao->name;
            $userMake->user_nickname=$kakao->nickname;
            $userMake->user_profile=$kakao->avatar;

            $userMake->user_password=Hash::make('test123!@#');
            $userMake->user_gender='0';
            $userMake->user_birthdate=Carbon::now();
            $userMake->termsagree='1';
            $userMake->privacyagree='1';
            $userMake->save();
        }
        $user=User::where('user_email',$kakao->email)->first();
        // dump($user);
        Auth::login($user);
        if(Auth::check()) {
            if(strlen($user->user_profile) < 3) {
                $user->user_profile = 'profile.png';
            }
            session($user->only('user_id', 'user_email', 'user_nickname', 'user_profile')); // 세션에 인증된 회원 pk 등록
            session()->put('kakao_flg', '1');
            return redirect()->intended(route('main'));
        } else {
            $error = '인증작업 에러';
            return redirect()->back()->with('error', $error);
        }
    }
}
