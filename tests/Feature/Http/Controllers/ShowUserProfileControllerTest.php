<?php


namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class ShowUserProfileControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()
            ->create();

        $this->user = $user;
    }

    #[Test]
    public function users_should_see_another_user_profiles_without_edit_buttons(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this
            ->actingAs($this->user)
            ->get(route('profiles.show', ['username' => $user->username]))
            ->assertSuccessful()
            ->assertViewIs('profile.show')
            ->assertViewHas('user', $user)
            ->assertDontSeeText(__('user/profile.edit_account'))
            ->assertDontSeeText(__('user/profile.change_password'));
    }

    #[Test]
    public function users_should_see_its_own_profile_edit_buttons(): void
    {
        $this
            ->actingAs($this->user)
            ->get(route('profiles.show', $this->user->username))
            ->assertSuccessful()
            ->assertViewIs('profile.show')
            ->assertViewHas('user', $this->user)
            ->assertSeeText(__('user/profile.edit_account'))
            ->assertSeeText(__('user/profile.change_password'));
    }
}
