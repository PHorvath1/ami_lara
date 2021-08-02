<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserCreateRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required']
        ];
    }

    public function transform(){
        $email = $this->validated()['email'];
        $user_part = Str::of($email)->before('@')->lower();
        return [
            'email' => $email,
            'name' => $user_part,
            'password' => \Hash::make("password-$user_part")
        ];
    }
}
