<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolumeRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'title' => [],
            'release_year' => [ 'required', 'numeric', 'min:1900' ],
            'description' => [ 'required', 'min:10' ]
        ];
    }
}
