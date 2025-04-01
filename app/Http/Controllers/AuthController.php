<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'error' => "Password or email might be wrong"
        ]);

    }

    public function register(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|unique:users|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('home');

    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
        
    }
}
