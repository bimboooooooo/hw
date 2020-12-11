<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phoneNumber' => 'required|string|size:12'
        ];
    }
}
