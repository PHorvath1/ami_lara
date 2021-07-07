<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevisionRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'pdf_path' => [ 'required' ],
            'latex_path' => [ 'required' ]
        ];
    }
}
