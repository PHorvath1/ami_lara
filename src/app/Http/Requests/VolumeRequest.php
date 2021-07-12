<?php

namespace App\Http\Requests;

class VolumeRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'release_year' => [ 'required', 'numeric', 'min:1900' ],
            'description' => [ 'required', 'min:10' ]
        ];
    }
}
