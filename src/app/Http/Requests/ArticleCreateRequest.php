<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pdf' => [ 'required' ],
            'title' => [ 'required', 'min:10' ],
            'abstract' => [ 'required', 'min:10' ],
            'page_count' => [],
            'article_type' => [ 'required' ],
            'note' => [],
            'doi' => [],
            'language' => [ 'required' ],
            'authors' => [ 'required' ],
            'categories' => [ 'required' ],
            'latex' => []
        ];
    }
}
