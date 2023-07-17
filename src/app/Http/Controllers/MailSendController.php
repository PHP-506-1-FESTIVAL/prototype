<?php

namespace App\Http\Controllers;


use App\Mail\RegisMail;
use App\Models\RegistToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mail_regist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registMail(Request $req)
    {

        // dump($req);
        // dump($req->user);
        $req->validate([
            'email' => 'same:emailChk|required|regex:/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i|max:320'
        ]);

        $data=User::all()->where('user_email',$req->email)->count('*');
        // dump($data);
        if ($data!==0) {
            $error = '이미 존재한 이메일입니다';
            return redirect()->back()->with('error', $error);
        }

        $mail=new RegistToken;
        $mail->send_mail=$req->email;
        $mail->mail_flg='0';
        $mail->mail_token=Str::random(40);
        $mail->save();
        // dump($mail);
        Mail::to($req->email)->send(new RegisMail($mail));
        return view('mail_success');
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
