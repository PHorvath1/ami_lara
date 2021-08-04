<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'active' => ['required']
        ];
    }
}
