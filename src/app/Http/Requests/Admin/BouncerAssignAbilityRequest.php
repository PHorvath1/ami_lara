<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ExtendedFormRequest;
use Illuminate\Validation\Rule;

class BouncerAssignAbilityRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'role_name'  => ['required',  Rule::unique('roles', 'name')],
            'ability_name' => ['required'],
            'entity' => ['required']
        ];
    }
}
