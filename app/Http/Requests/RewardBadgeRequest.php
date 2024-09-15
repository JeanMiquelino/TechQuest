<?php


namespace Gamify\Http\Requests;

use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Validation\Rule;

class RewardBadgeRequest extends Request
{
    public function rules(): array
    {
        return [
            'badge_username' => [
                'required',
                Rule::exists(User::class, 'username'),
            ],
            'badge' => [
                'required',
                Rule::exists(Badge::class, 'id'),
            ],
        ];
    }

    public function usernameToReward(): string
    {
        return $this->input('badge_username');
    }

    public function badge(): string
    {
        return $this->input('badge');
    }
}
