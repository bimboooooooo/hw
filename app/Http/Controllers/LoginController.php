<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\NumberRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function numCheck(NumberRequest $request)
    {
        $user = User::where('number', $request->phoneNumber)->first();
        if ($user) {
            Cache::put('number', $request->phoneNumber, 3 * 60);
            return view('auth.login');
        }
        return $this->codeGenerator($request->phoneNumber);
    }

    public function codeGenerator($phoneNumber)
    {
        $confCode = rand(10000, 99999);
        Log::info("$phoneNumber: $confCode");
        Cache::put($phoneNumber, $confCode, 3 * 60);
        return view('auth.verify', ['number' => $phoneNumber]);
    }

    public function verification(Request $request)
    {
        dump(Cache::get($request->phoneNumber));
        switch (Cache::get($request->phoneNumber)) {
            case null:
                return view('auth.home')
                    ->with('expr', 'Verification code expired. Please try again.');
            case $request->code != Cache::get($request->phoneNumber):
                return view('auth.verify', ['number' => $request->phoneNumber])
                    ->with('message', 'Verification failed, please try again.');
            default:
                return view('auth.register', ['number' => $request->phoneNumber]);
        }
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('number', Cache::get('number'))->first();
        if (Hash::check($request->password, $user->getAuthPassword())) {
            Auth::login($user);
                if ($user->hasRole('admin')) {
                    return action('App\Http\Controllers\AdminController@index',['user'=>$user]);
                }
            return view('home');
        }
    }
}
