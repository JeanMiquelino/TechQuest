<?php


namespace Tests\Feature\Http\Controllers\Account;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\TestCase;

final class ChangePasswordControllerTest extends TestCase
{
    const VALID_PASSWORD = 'foo#B4rBaz';

    #[Test]
    public function it_shows_password_change_form_for_logged_users(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('account.password.index'))
            ->assertSuccessful()
            ->assertViewIs('account.password.index');
    }

    #[Test]
    public function it_shows_error_for_non_logged_users(): void
    {
        $this
            ->get(route('account.password.index'))
            ->assertRedirect(route('login'));
    }

    #[Test]
    public function it_shows_validation_error_if_current_password_is_invalid(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'password' => 'this-is-the-password',
        ]);

        $this
            ->actingAs($user)
            ->post(route('account.password.update'), [
                'current-password' => 'this-is-not-the-password',
                'new-password' => self::VALID_PASSWORD,
                'new-password_confirmation' => self::VALID_PASSWORD,
            ])
            ->assertInvalid(['current-password']);
    }

    #[Test]
    public function it_shows_validation_error_if_new_password_confirmation_does_not_match(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'password' => 'this-is-the-password',
        ]);

        $this
            ->actingAs($user)
            ->post(route('account.password.update'), [
                'current-password' => 'this-is-the-password',
                'new-password' => 'foo#B4rBaz',
                'new-password_confirmation' => 'anotherFoo',
            ])
            ->assertInvalid(['new-password']);
    }

    #[Test]
    public function it_has_success_key_on_session_when_password_has_been_changed(): void
    {
        /** @var User $user */
        $user = User::factory()->create([
            'password' => 'this-is-the-password',
        ]);

        $want = self::VALID_PASSWORD;

        $this
            ->actingAs($user)
            ->post(route('account.password.update'), [
                'current-password' => 'this-is-the-password',
                'new-password' => $want,
                'new-password_confirmation' => $want,
            ])
            ->assertRedirect(route('account.password.index'))
            ->assertValid()
            ->assertSessionHas('success');

        Hash::check($want, $user->password);
    }
}
