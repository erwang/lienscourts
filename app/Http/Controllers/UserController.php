<?php

namespace App\Http\Controllers;

use App\Link;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard()
    {
        if(Session::exists('link')){
            $link = Session::get('link');
            Session::remove('link');
            return view('users.dashboard',['links'=>Auth::user()->links,'link'=>$link]);
        }
        return view('users.dashboard',['links'=>Auth::user()->links]);
    }

}
