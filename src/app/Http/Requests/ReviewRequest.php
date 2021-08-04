<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'content' => [ 'required' ]
        ];
    }
}
