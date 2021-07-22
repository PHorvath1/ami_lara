<?php

namespace App\Http\Requests;

class CommentRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'content' => [ 'required', 'min:10' ],
            'user_id' => [ 'required' ],
            'revision_id' => [ 'required' ]
        ];
    }
}
