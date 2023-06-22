<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function emailindex()
    {
        $apiData['emailflg'] = '0';
        return $apiData;
    }

    public function emailshow($id)
    {
        $result = User::where('user_email', $id)->first();
        if(!$result) {
            $apiData['emailflg'] = '0';
        } else {
            $apiData['emailflg'] = '1';
        }
        return $apiData;
    }

    public function nickindex()
    {
        $apiData['nickflg'] = '0';
        return $apiData;
    }

    public function nickshow($id)
    {
        $result = User::where('user_nickname', $id)->first();
        if(!$result) {
            $apiData['nickflg'] = '0';
        } else {
            $apiData['nickflg'] = '1';
        }
        return $apiData;
    }
}
