<?php


namespace Gamify\Http\Requests;

use Gamify\Models\User;
use Illuminate\Validation\Rule;

class RewardExperienceRequest extends Request
{
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'string',
                Rule::exists(User::class, 'username'),
            ],
            'points' => [
                'required',
                'integer',
            ],
            'message' => [
                'required',
                'string',
            ],
        ];
    }

    public function usernameToReward(): string
    {
        return $this->input('username');
    }

    public function experience(): int
    {
        return $this->input('points');
    }

    public function reason(): string
    {
        return $this->input('message');
    }
}
