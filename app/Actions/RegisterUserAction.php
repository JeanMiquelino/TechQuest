<?php


namespace Gamify\Actions;

use Gamify\Enums\Roles;
use Gamify\Models\User;

final class RegisterUserAction
{
    public function execute(
        string $username,
        string $email,
        string $password,
    ): User {
        $createUserAction = app()->make(CreateUserAction::class);

        return $createUserAction->execute(
            $username,
            $email,
            $username,
            $password,
            Roles::Player,
        );
    }
}
