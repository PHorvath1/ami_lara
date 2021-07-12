<?php

namespace App\Http\Requests;

class CategoryRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'name' => [ 'required' ]
        ];
    }
}
