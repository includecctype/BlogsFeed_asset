<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogsFeedController;

Route::get('/', [BlogsFeedController::class, 'routes'])->name('home');

Route::get('/Profile', [BlogsFeedController::class, 'routes'])->name('profile');

// Route::get('/Profile', function(){
//     return view('Profile.profile');
// })->name('profile');