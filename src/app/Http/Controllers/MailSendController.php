<?php

namespace App\Http\Controllers;


use App\Mail\RegisMail;
use App\Models\RegistToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailSendController extends Controller
{
    /************************************************
     * 프로젝트명   : festival_info
     * 디렉토리     : UserController
     * 파일명       : web.php
     * 이력         : v002 0717 김재성 new
     ************************************************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mail_regist');
    }

    public function findIndex()
    {
        return view('mail_find');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registMail(Request $req)
    {
        $req->validate([
            'email' => 'required|regex:/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i|max:320'
        ]);

        $data=User::all()->where('user_email',$req->email)->count('*');
        if ($data!==0) {
            $error = '이미 존재한 이메일입니다';
            return redirect()->back()->with('error', $error);
        }

        $mail=new RegistToken;
        $mail->send_mail=$req->email;
        $mail->mail_flg='0';
        $mail->mail_token=Str::random(40);
        $mail->save();

        $mail->mail_title='새로운 마실가실 계정 생성을 계속 진행하려면 아래에서 이메일 주소를 인증해 주세요.';
        $mail->mail_content='마실가실을 활용하여 다양한 축제찾아 볼 수 있으며 커뮤니티를 활용하여 다양한 정보를 얻어보세요.';
        Mail::to($req->email)->send(new RegisMail($mail));
        return view('mail_success');
    }
    public function findMail(Request $req)
    {
        $req->validate([
            'email' => 'required|regex:/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i|max:320'
        ]);

        $data=User::all()->where('user_email',$req->email)->count('*');
        if ($data===0) {
            $error = '존재하지않는 이메일입니다';
            return redirect()->back()->with('error', $error);
        }

        $mail=new RegistToken;
        $mail->send_mail=$req->email;
        $mail->mail_flg='1';
        $mail->mail_token=Str::random(40);
        $mail->save();

        $mail->mail_title='기존의 마실가실 계정을 찾으시려면 계속 진행해주세요.';
        $mail->mail_content='마실가실을 활용하여 다양한 축제찾아 볼 수 있으며 커뮤니티를 활용하여 다양한 정보를 얻어보세요.';
        Mail::to($req->email)->send(new RegisMail($mail));
        return view('mail_success');
    }

    function mailIC($id) {

        $data=RegistToken::select('send_mail','send_timer','mail_flg','mail_token')->where('mail_token',$id)->first();
        $now=Carbon::now();
        $user=User::where('user_email',$data->send_mail)->first();
        if ($data->send_timer<$now) {
            return view('errors.expirationToken'); //todo 토큰만료 페이지
        }

        if ($data->mail_flg==='0') {
            if ($user) {
                return view('errors.404'); //todo 이미 존재한 회원
            }
            return view('terms')->with('data',$data);
        } else if($data->mail_flg==='1') {
            return view('pw_chang')->with('data',$data);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
