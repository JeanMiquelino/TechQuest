<?php


namespace Gamify\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Gamify\Enums\Roles;
use Gamify\Models\User;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /** @var User $user */
        $user = $this->route('user');

        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
            'role' => [
                'required',
                new EnumValue(Roles::class),
            ],
        ];
    }
}
