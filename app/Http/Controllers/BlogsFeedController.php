<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogsFeedController extends Controller
{
    public function routes(Request $request){
        if($request->is('/')){
            return view('home', ['pathname' => 'home']);
        }elseif($request->is('Profile')){
            return view('Profile.profile', ['pathname' => 'profile']);
        }
    }
}
