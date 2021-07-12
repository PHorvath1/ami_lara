<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required']
        ];
    }
}
