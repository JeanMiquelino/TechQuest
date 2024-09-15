<?php


namespace Gamify\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Gamify\Enums\Roles;
use Gamify\Rules\UsernameRule;
use Illuminate\Validation\Rule;

class UserCreateRequest extends Request
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
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
            ],
            'role' => [
                'required',
                new EnumValue(Roles::class),
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

    public function name(): string
    {
        return $this->input('name');
    }

    public function role(): string
    {
        return $this->input('role');
    }
}
