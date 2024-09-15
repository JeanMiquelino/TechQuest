<?php


namespace Gamify\Http\Requests;

use Gamify\Rules\UsernameRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRegistrationRequest extends Request
{
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'max:255',
                new UsernameRule(),
                Rule::unique('users'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
            ],
            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
            'terms' => [
                'accepted',
                'exclude',
            ],
        ];
    }

    public function username(): string
    {
        return $this->input('username');
    }

    public function email(): string
    {
        return $this->input('email');
    }

    public function password(): string
    {
        return $this->input('password');
    }
}
