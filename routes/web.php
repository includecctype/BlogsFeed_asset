<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogsFeedController;
use App\Http\Controllers\AuthController;

Route::get('/', [BlogsFeedController::class, 'routes'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/Profile', [BlogsFeedController::class, 'routes'])->name('profile');
    Route::get('/Setting', function(){return view('Setting.setting');})->name('setting');
    Route::post('/post', [BlogsFeedController::class, 'post'])->name('post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::get('/login', [BlogsFeedController::class, 'routes'])->name('login');    
    Route::get('/register', [BlogsFeedController::class, 'routes'])->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});




