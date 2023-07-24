<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $notice=Notice::withTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.notice_list')->with('notice',$notice);
    }
    public function write()
    {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        return view('admin.notice_write');
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
        $req->validate([
            'title'     => 'required|between:1,50'
            ,'content'  => 'required|max:2000'
        ]);
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
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $notice=Notice::find($id);
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
        $req->validate([
            'title'     => 'required|between:1,50'
            ,'content'  => 'required|max:2000'
        ]);
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
    public function search(Request $req)
    {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        // Log::debug("admin search Start");
        // Log::debug("admin search", $req->all());
        $req->validate(['search'=>'required|max:100']);
        $notice_search=DB::table('notices')->
        where(function ($query) use ($req) {
            $query->where('notice_title','like','%'.$req->search.'%') // 제목에 검색내용이 포함된경우
            ->orWhere('notice_content','like','%'.$req->search.'%'); // 보드내용에 검색내용이 포함된경우
        })->orderBy('created_at','desc')->paginate(10);
        // dump($notice_search);
        // exit;
        // $json_list = json_encode($notice_search);
        // $list = json_decode($json_list,true);
        // Log::debug("admin search", $list);
        return view('admin.notice_list')->with('notice',$notice_search);
    }
    function articled(Request $req) {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $notice = Notice::withTrashed()->find($req->id);
        return view('admin/notice_article')->with('notice', $notice);
    }
}
