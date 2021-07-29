<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BouncerAssignAbilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'role_name'  => ['required',  Rule::unique('roles', 'name')],
            'ability_name' => ['required'],
            'entity' => ['required']
        ];
    }
}
