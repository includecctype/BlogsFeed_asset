<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class BlogsFeedController extends Controller
{
    public function routes(Request $request){

        $current_user_id = Auth::id();
        $personal_posts = DB::table('posts')->where('user_id', $current_user_id)->get();
        $personal_acc = DB::table('users')->where('id', $current_user_id)->first();

        $posts = POST::orderBy('id', 'desc')->get();

        if($request->is('/')){
            return view('home')
                ->with('pathname', 'home')
                ->with('posts', $posts);
        }elseif($request->is('Profile')){
            return view('Profile.profile')
                ->with('pathname', 'profile')
                ->with('posts', $personal_posts)
                ->with('user', $personal_acc);
        }elseif($request->is('login')){
            return view('auth.login', ['pathname' => 'auth']);
        }elseif($request->is('register')){
            return view('auth.register', ['pathname' => 'auth']);
        }
    }

    public function post(Request $request){

        $request->validate([
            'post_text' => 'required|string|min:1',
            'post_file' => 'mimes:jpg,png|max:2048',
        ]);

        $path ??= Storage::put('images', $request->file('post_file'), 'public');

        Post::create([
            'post_text' => $request->post_text,
            'post_file' => $path,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('home');

    }
}
