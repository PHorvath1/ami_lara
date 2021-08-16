<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ArticleEditRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'pdf' => [],
            'title' => [ 'required', 'min:10' ],
            'abstract' => [ 'required', 'min:10' ],
            'state' => ['required'],
            'page_count' => [],
            'note' => [],
            'doi' => [],
            'language' => [],
            'user_id' => [],
            'categories' => [ 'required' ],
            'volume_id' => [],
            'type_id' => [],
            'latex' => []
        ];
    }
}
