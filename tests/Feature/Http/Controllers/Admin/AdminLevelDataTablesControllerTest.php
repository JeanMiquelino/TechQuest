<?php


namespace Tests\Feature\Http\Controllers\Admin;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\Roles;
use Gamify\Models\Level;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class AdminLevelDataTablesControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User user */
        $user = User::factory()->create();

        $this->user = $user;
    }

    #[Test]
    public function admins_should_get_data_tables_data(): void
    {
        $this->user->role = Roles::Admin();

        $levels = Level::factory()
            ->count(3)
            ->create();

        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.levels.data'))
            ->assertSuccessful()
            ->assertJsonCount($levels->count(), 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'name',
                        'required_points',
                        'image',
                        'active',
                    ],
                ],
            ]);
    }

    #[Test]
    public function users_should_not_get_data_tables_data(): void
    {
        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.levels.data'))
            ->assertForbidden();
    }

    #[Test]
    public function it_should_fail_if_ajax_is_not_used(): void
    {
        $this
            ->get(route('admin.levels.data'))
            ->assertForbidden();
    }
}
