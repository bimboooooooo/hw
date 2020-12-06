<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class PhoneNumberController extends Controller
{
    public function index($phoneNumber)
    {
        $confCode = rand(10000, 99999);
        Log::info("$phoneNumber: $confCode");
        Cache::put($phoneNumber, $confCode, 90);
    }

    public function verification($phoneNumber, $confCode)
    {
        $cashedCode = Cache::get($phoneNumber);
        if ($confCode && $phoneNumber == $cashedCode) {
            return response('Verification succeeded.');
        }
        return response('Verification failed.');
    }
}

