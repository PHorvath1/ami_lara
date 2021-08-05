<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pdf' => [ 'required' ],
            'user_id' => [],
            'editor_id' => [],
            'title' => [ 'required', 'min:10' ],
            'abstract' => [ 'required', 'min:10' ],
            'page_count' => [],
            'article_type' => [ 'required' ],
            'note' => [],
            'type_id' => [],
            'doi' => [],
            'language' => [],
            'authors' => [ 'required' ],
            'categories' => [ 'required' ],
            'latex' => []

        ];
    }
}
