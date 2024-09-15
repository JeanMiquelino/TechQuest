<?php


namespace Gamify\Actions;

use Gamify\Models\User;

class UpdatePasswordAction
{
    public function execute(User $user, string $password): User
    {
        $user->password = $password;

        $user->save();

        return $user;
    }
}
