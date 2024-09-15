<?php


namespace Tests\Feature\Services;

use Laravel\Socialite\Contracts\User;

final class MockedExternalUser implements User
{
    public function __construct(
        private string $id,
        private string $nickname,
        private string $name,
        private string $email,
        private string $avatar = 'external-avatar',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
