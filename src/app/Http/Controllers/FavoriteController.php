<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function jjmPost(Request $req)
    {
        if(auth()->guest()) {
            return redirect()->route('user.login');
        }
        // dump($req);
        $arr_req=explode(',',$req->test);
        $jjm = Favorite::where('festival_id', 256)->where('user_id', session()->get('user_id'))->get();
        if(!isset($jjm[0]->favorite_id)) {
            $fav=new Favorite(['user_id'=>$arr_req[0]
            ,'festival_id'=>$arr_req[1]]);
            $fav->save();
            return redirect()->route('fes.detail', ['id'=>$arr_req[1]]);
        } else {
            return back();
        }

        
    }
    public function jjmDel(Request $req)
    {
        // dump($req);
        $arr_req=explode(',',$req->test);
        $fav=Favorite::where(['user_id'=>$arr_req[0]
        ,'festival_id'=>$arr_req[1]]);
        // dump($fav);
        $fav->delete();

        return redirect()->route('fes.detail', ['id'=>$arr_req[1]]);
    }
}

