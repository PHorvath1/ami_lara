<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required']
        ];
    }
}
