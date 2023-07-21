<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class AdminNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice=Notice::all();
        // dump($notice);
        // exit;
        return view('admin.notice_list')->with('notice',$notice);
    }
    public function write()
    {

        $data=[
            'card_title'=>'공지 작성'
            ,'submit_btn'=>'작성'
        ];
        // $data=collect([
        //     'card_title'=>'공지 작성'
        //     ,'submit_btn'=>'작성'
        // ]);
        // $data
        // $data->card_title='공지 작성';
        // dump($data);
        // exit;
        return view('admin.notice_write')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dump($req);
        $notice=new Notice;
        $notice->notice_title=$req->title;
        $notice->notice_content=$req->content;
        $notice->admin_id=session('admin_id');
        $notice->save();
        // dump($notice);
        return redirect()->route('admin.notice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice=Notice::find($id);
        $notice->card_title='수정';
        // dump($notice);
        return view('admin.notice_update')->with('data',$notice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $notice= Notice::find($id);
        // dump($notice);
        // dump($req);
        $notice->notice_title=$req->title;
        $notice->notice_content=$req->content;
        $notice->admin_id=session('admin_id');
        $notice->save();
        // dump($notice);
        return redirect()->route('admin.notice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice=Notice::find($id);
        // dump($notice);
        $notice->delete();
        return redirect()->route('admin.notice');
    }
}
