<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class BlogsFeedController extends Controller
{
    public function routes(Request $request){

        $current_user_id = Auth::id();

        $personal_acc = DB::table('users')->where('id', $current_user_id)->first();
        $personal_posts = DB::table('posts')->where('user_id', $current_user_id)->orderBy('id', 'desc')->get();
        $personal_post_imgs = [];
        foreach($personal_posts as $post){
            $personal_post_imgs[] = Storage::disk('s3')->url($post->post_file);
        }

        $posts = POST::orderBy('id', 'desc')->get();
        $post_imgs = [];
        foreach($posts as $post){
            $post_imgs[] = Storage::disk('s3')->url($post->post_file);
        }

        if($request->is('/')){
            return view('home')
                ->with('pathname', 'home')
                ->with('posts', $posts)
                ->with('images', $post_imgs);
        }elseif($request->is('Profile')){
            return view('profile.profile')
                ->with('pathname', 'profile')
                ->with('posts', $personal_posts)
                ->with('user', $personal_acc)
                ->with('images', $personal_post_imgs);
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

        $path = "0";
        
        if($request->hasFile('post_file')){
            $path = Storage::disk('s3')->put('images', $request->file('post_file'), 'public');
        }else{
            $path = "0";
        }

        $id ??= Auth::id();
        $user ??= DB::table('users')->where('id', $id)->select('name')->first();
        $name ??= $user->name;

        Post::create([
            'post_text' => $request->post_text,
            'post_file' => $path,
            'username' => $name,
            'user_id' => $id,
        ]);

        return redirect()->route('home');

    }
}
