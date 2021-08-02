<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ExtendedFormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class BouncerAssignRoleRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', Rule::exists('users', 'id')],
            'role_name' => ['required', Str::snake('string')]
        ];
    }
}
