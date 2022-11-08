<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'pdf' => [ 'required' ],
            'title' => [ 'required', 'min:10' ],
            'abstract' => [ 'required', 'min:10' ],
            'type_id' => [ 'required' ],
            'user_name' => [ 'required' ],
            'categories' => [ 'required' ],

        ];
    }
}
