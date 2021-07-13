<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends ExtendedFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $validationRules = [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user?->id)], //Since only the logged in user can edit their OWN profile this is fine
            'current_password' => ['required', 'password:web']
        ];

        if($this->has('password') && !empty($this->get('password'))){
            $validationRules['password'] = [
                'confirmed',          // this means there is a password_confirmation input, which must match this
                'string',             // regex is buggy without specifying the type, probably a bug with the validation engine
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ];
        }
        return $validationRules;
    }
}
