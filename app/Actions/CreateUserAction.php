<?php


namespace Gamify\Actions;

use Gamify\Models\User;
use Illuminate\Auth\Events\Registered;

final class CreateUserAction
{
    /**
     * Creates an User, its profile and dispatch events.
     */
    public function execute(
        string $username,
        string $email,
        string $name,
        string $password,
        string $role,
        bool $skipEmailVerification = false
    ): User {
        $user = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);

        $user->profile()->create();

        if ($skipEmailVerification) {
            $user->email_verified_at = now();
            $user->save();
        }

        event(new Registered($user));

        return $user;
    }
}
