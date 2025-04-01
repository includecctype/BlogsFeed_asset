<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

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
        }elseif($request->is('login')){
            return view('auth.login', ['pathname' => 'auth']);
        }elseif($request->is('register')){
            return view('auth.register', ['pathname' => 'auth']);
        }
    }

    public function post(Request $request){

        $validated = $request->validate([
            'post_text' => 'required|string|min:1',
            'post_file' => 'nullable|image'
        ]);

        Post::create($validated);

        return redirect()->route('home');

    }
}
