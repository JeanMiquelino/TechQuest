<?php


namespace Tests\Feature\Services;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\LinkedSocialAccount;
use Gamify\Models\User;
use Gamify\Services\SocialAccountService;
use Tests\Feature\TestCase;

final class SocialAccountServiceTest extends TestCase
{
    const PROVIDER_NAME = 'testing-provider';

    const EXTERNAL_USER_ID = 'external-id';

    #[Test]
    public function it_creates_social_account_when_the_user_does_not_exist(): void
    {
        /** @var User $want */
        $want = User::factory()->make();

        $mockedExternalUser = new MockedExternalUser(
            id: self::EXTERNAL_USER_ID,
            nickname: $want->username,
            name: $want->name,
            email: $want->email,
        );

        $serv = new SocialAccountService();

        $user = $serv->findOrCreate($mockedExternalUser, self::PROVIDER_NAME);

        $this->assertDatabaseHas(User::class, [
            'username' => $want->username,
            'email' => $want->email,
            'name' => $want->name,
        ]);

        $this->assertDatabaseHas(LinkedSocialAccount::class, [
            'user_id' => $user->id,
            'provider_name' => self::PROVIDER_NAME,
            'provider_id' => self::EXTERNAL_USER_ID,
        ]);
    }

    #[Test]
    public function it_creates_social_account_when_the_user_exists(): void
    {
        /** @var User $want */
        $want = User::factory()->create();

        $mockedExternalUser = new MockedExternalUser(
            id: self::EXTERNAL_USER_ID,
            nickname: $want->username,
            name: $want->name,
            email: $want->email,
        );

        $serv = new SocialAccountService();

        $user = $serv->findOrCreate($mockedExternalUser, self::PROVIDER_NAME);

        $this->assertTrue($user->is($want));

        $this->assertDatabaseHas(LinkedSocialAccount::class, [
            'user_id' => $want->id,
            'provider_name' => self::PROVIDER_NAME,
            'provider_id' => self::EXTERNAL_USER_ID,
        ]);
    }

    #[Test]
    public function it_creates_an_user_with_an_unique_username_when_the_username_is_already_in_use(): void
    {
        User::factory()->create([
            'username' => 'foo',
        ]);

        /** @var User $want */
        $want = User::factory()->make([
            'username' => 'foo',
        ]);

        $mockedExternalUser = new MockedExternalUser(
            id: self::EXTERNAL_USER_ID,
            nickname: $want->username,
            name: $want->name,
            email: $want->email,
        );

        $serv = new SocialAccountService();

        $user = $serv->findOrCreate($mockedExternalUser, self::PROVIDER_NAME);

        $this->assertNotEquals($want->username, $user->username);

        $this->assertDatabaseHas(User::class, [
            'username' => $user->username,
            'email' => $want->email,
            'name' => $want->name,
        ]);

        $this->assertDatabaseHas(LinkedSocialAccount::class, [
            'user_id' => $user->id,
            'provider_name' => self::PROVIDER_NAME,
            'provider_id' => self::EXTERNAL_USER_ID,
        ]);
    }

    #[Test]
    public function it_returns_the_user_which_has_the_related_social_account(): void
    {
        /** @var User $want */
        $want = User::factory()->create();

        $want->accounts()->create([
            'provider_name' => self::PROVIDER_NAME,
            'provider_id' => self::EXTERNAL_USER_ID,
        ]);

        $mockedExternalUser = new MockedExternalUser(
            id: self::EXTERNAL_USER_ID,
            nickname: $want->username,
            name: $want->name,
            email: $want->email,
        );

        $serv = new SocialAccountService();

        $user = $serv->findOrCreate($mockedExternalUser, self::PROVIDER_NAME);

        $this->assertTrue($user->is($want));

        $this->assertDatabaseHas(LinkedSocialAccount::class, [
            'user_id' => $want->id,
            'provider_name' => self::PROVIDER_NAME,
            'provider_id' => self::EXTERNAL_USER_ID,
        ]);
    }
}
