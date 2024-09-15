<?php


namespace Tests\Feature\Actions;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Actions\CreateUserAction;
use Gamify\Models\User;
use Gamify\Models\UserProfile;
use Tests\Feature\TestCase;

final class CreateUserTest extends TestCase
{
    #[Test]
    public function it_should_create_a_user_with_its_profile(): void
    {
        /** @var User $want */
        $want = User::factory()->make();

        $createUserAction = app()->make(CreateUserAction::class);

        $user = $createUserAction->execute(
            username: $want->username,
            email: $want->email,
            name: $want->name,
            password: $want->password,
            role: $want->role
        );

        $this->assertInstanceOf(User::class, $user);

        $this->assertInstanceOf(UserProfile::class, $user->profile);

        $this->assertModelExists($user);
    }
}
