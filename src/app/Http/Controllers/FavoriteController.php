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
        $fav=new Favorite(['user_id'=>$arr_req[0]
        ,'festival_id'=>$arr_req[1]]);
        $fav->save();

        return redirect()->route('fes.detail', ['id'=>$arr_req[1]]);
    }
}

