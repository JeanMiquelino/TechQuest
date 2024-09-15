<?php


namespace Gamify\Actions;

use Gamify\Events\AvatarUploaded;
use Gamify\Events\ProfileUpdated;
use Gamify\Models\User;
use Illuminate\Support\Arr;

final class UpdateUserProfileAction
{
    public function execute(User $user, array $attributes): User
    {
        $user->update([
            'name' => $attributes['name'],
        ]);

        $user->profile
            ->update($attributes);

        if (Arr::has($attributes, 'avatar')) {
            $user->profile
                ->addMedia($attributes['avatar'])
                ->toMediaCollection('avatar');

            AvatarUploaded::dispatch($user);
        }

        ProfileUpdated::dispatchIf(
            $user->wasChanged('name') || $user->profile->wasChanged(),
            $user
        );

        return $user;
    }
}
