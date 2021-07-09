<?php

namespace App\Http\Requests;

class VolumeRequest extends ExtendedFormRequest
{

    public function rules(): array
    {
        return [
            'release_year' => [ 'required' ]
        ];
    }
}
