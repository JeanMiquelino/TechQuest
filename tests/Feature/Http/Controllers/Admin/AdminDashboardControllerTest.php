<?php


namespace Tests\Feature\Http\Controllers\Admin;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class AdminDashboardControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $admin */
        $admin = User::factory()->admin()->create();
        $this->actingAs($admin);
    }

    #[Test]
    public function access_is_restricted_to_admins(): void
    {
        $test_data = [
            ['protocol' => 'GET', 'route' => route('admin.home')],
        ];

        /** @var User $user */
        $user = User::factory()->create();

        foreach ($test_data as $test) {
            $this->actingAs($user)
                ->call($test['protocol'], $test['route'])
                ->assertForbidden();
        }
    }

    #[Test]
    public function index_returns_proper_content(): void
    {
        $this->get(route('admin.home'))
            ->assertOK()
            ->assertViewIs('admin.dashboard.index')
            ->assertViewHasAll([
                'players_count',
                'questions_count',
                'badges_count',
                'levels_count',
                'latest_questions',
                'latest_users',
            ]);
    }
}
