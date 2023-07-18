<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('kakao')->redirect();
    }
    public function back()
    {
        $user = Socialite::driver('kakao')->stateless()->user();

        dump($user);

        return $user->getRaw();
    }
    //     public function back()
    // {
    //     $userSocial = Socialite::driver('kakao')->user();

    //     $users = User::where(['user_email' => $userSocial->getEmail()])->first();

    //     if ($users) {
    //         Auth::login($users);
    //         return redirect('/');
    //     } else {
    //         $user = User::create([
    //             'user_name'      => $userSocial->getName(),
    //             'user_email'     => $userSocial->getEmail(),
    //             // 'user_gender'    => $userSocial->getGender(),
    //             'user_gender'    => null,
    //             'user_birthdate' => $userSocial->getDateOfBirth(),
    //             // 'provider_id'    => $userSocial->getId(),
    //         ]);

    //         Auth::login($user);
    //         return redirect('/');
    //     }
    // }
}
