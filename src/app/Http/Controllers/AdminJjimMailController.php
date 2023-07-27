<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Festival;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminJjimMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jjim_id = DB::table('favorites')
                ->join('festivals', 'favorites.festival_id', '=', 'festivals.festival_id' )
                ->select('*')->paginate(10);
                // ->select('*')->where('festival_start_date',$timer)->paginate(10);
        $i=0;
        $user=[];
        foreach ($jjim_id as $value) {
            $user[$i]=User::find($value->user_id);
            $i++;
        }
        return view('admin.jjim_mail_list')->with('users',$user)->with('jjim',$jjim_id);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function articled(Request $req) {
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $jjim_id=Favorite::find($req->id);
        $user=User::withTrashed()->find($jjim_id->user_id);
        $festival = Festival::find($jjim_id->festival_id);

        return view('emails/orders/jjimMail')->with('fes', $festival)->with('user',$user);
    }
    public function search(Request $req)
    {
        // dump($req);
        // exit;
        if(auth()->guest()) {
            return redirect()->route('admin.login');
        }
        $req->validate(['date'=>'required|max:100']);
        $timer=Carbon::createFromFormat('Y-m-d',$req->date)->addWeek(1)->format('Y-m-d');
        $jjim_id = DB::table('favorites')
        ->join('festivals', 'favorites.festival_id', '=', 'festivals.festival_id' )
        ->select('*')->where('festival_start_date',$timer)->paginate(10);
        $i=0;
        $user=[];
        foreach ($jjim_id as $value) {
            $user[$i]=User::find($value->user_id);
            $i++;
        }
        return view('admin.jjim_mail_list')->with('users',$user)->with('jjim',$jjim_id);
    }
}
