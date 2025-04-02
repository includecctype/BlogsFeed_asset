<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Post;

class BlogsFeedController extends Controller
{
    public function routes(Request $request){

        $current_user_id = Auth::id();
        $personal_posts = DB::table('posts')->where('user_id', $current_user_id)->get();

        $posts = POST::orderBy('id', 'desc')->get();

        if($request->is('/')){
            return view('home')
                ->with('pathname', 'home')
                ->with('posts', $posts);
        }elseif($request->is('Profile')){
            return view('Profile.profile')
                ->with('pathname', 'profile')
                ->with('posts', $personal_posts);
        }elseif($request->is('login')){
            return view('auth.login', ['pathname' => 'auth']);
        }elseif($request->is('register')){
            return view('auth.register', ['pathname' => 'auth']);
        }
    }

    public function post(Request $request){

        $validated = $request->validate([
            'post_text' => 'required|string|min:1',
            'post_file' => 'nullable|image',
        ]);

        $validated['user_id'] = Auth::id();

        $validated && Post::create($validated);

        return redirect()->route('home');

    }
}
