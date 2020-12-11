<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.home');
});
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('newUser', [App\Http\Controllers\LoginController::class, 'index'])->name('newUser');
Route::post('login',[\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('verify',[\App\Http\Controllers\LoginController::class,'verification'])->name('verify');

Route::get('login', function () {return view('auth.home');})->name('login');
