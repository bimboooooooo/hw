<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.home');
});
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('newUser', [App\Http\Controllers\LoginController::class, 'numCheck'])->name('newUser');
Route::post('login',[\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('verify',[\App\Http\Controllers\LoginController::class,'verification'])->name('verify');

Route::get('login', function () {return view('auth.home');})->name('login');

Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('admin.users',[\App\Http\Controllers\AdminController::class,'showUsers'])->name('admin.users');
Route::get('admin.posts',[\App\Http\Controllers\AdminController::class,'showPosts'])->name('admin.Posts');
