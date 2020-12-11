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
    public function index(NumberRequest $request)
    {
        $user = User::where('number', $request->phoneNumber)->first();
        if ($user) {
            Cache::put('number', $request->phoneNumber, 3 * 60);
            return view('auth.login');
        } else {
            $confCode = rand(10000, 99999);
            Log::info("$request->phoneNumber: $confCode");
            Cache::put($request->phoneNumber, $confCode, 3 * 60);
            return view('auth.verify',['number' => $request->phoneNumber]);
        }
    }

    public function verification(Request $request)
    {
        dump(Cache::get($request->phoneNumber));
        if (!Cache::get($request->phoneNumber)){
            return view('auth.home')->with('expr' , 'Verification code expired. Please try again.');
        }
        if (!$request->code || $request->code !=Cache::get($request->phoneNumber)){
            return view('auth.verify',['number' => $request->phoneNumber])->with('message','Verification failed, please try again.');
        }
        return view('auth.register',['number' => $request->phoneNumber]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('number', Cache::get('number'))->first();
        if (Hash::check($request->password, $user->getAuthPassword())) {
            Auth::login($user);
            return view('home');
        }
    }
}
