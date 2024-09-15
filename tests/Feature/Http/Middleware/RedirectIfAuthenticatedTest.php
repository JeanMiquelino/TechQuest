<?php


namespace Tests\Feature\Http\Middleware;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Http\Middleware\RedirectIfAuthenticated;
use Gamify\Models\User;
use Gamify\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Tests\Feature\TestCase;

final class RedirectIfAuthenticatedTest extends TestCase
{
    const TEST_ENDPOINT = '/_test/only_for_guests';

    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware(RedirectIfAuthenticated::class)->get(self::TEST_ENDPOINT, function () {
            return 'Access granted for non authenticated users';
        });
    }

    #[Test]
    public function it_response_ok_for_non_authenticated_users(): void
    {
        $response = $this->get(self::TEST_ENDPOINT);

        $response->assertOk();
        $response->assertSee('Access granted for non authenticated users');
    }

    #[Test]
    public function it_redirects_to_home_for_authenticated_users_requests(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(self::TEST_ENDPOINT);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
