<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Post;

class BlogsFeedController extends Controller
{
    public function routes(Request $request){

        $posts = POST::orderBy('id', 'desc')->get();

        if($request->is('/')){
            return view('home')
                ->with('pathname', 'home')
                ->with('posts', $posts);
        }elseif($request->is('Profile')){
            return view('Profile.profile', ['pathname' => 'profile']);
        }
    }
}
