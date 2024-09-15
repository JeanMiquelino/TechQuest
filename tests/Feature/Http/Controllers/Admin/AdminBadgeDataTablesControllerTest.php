<?php


namespace Tests\Feature\Http\Controllers\Admin;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\Roles;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class AdminBadgeDataTablesControllerTest extends TestCase
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

        $badges = Badge::factory()
            ->count(3)
            ->create();

        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.badges.data'))
            ->assertSuccessful()
            ->assertJsonCount($badges->count(), 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'name',
                        'required_repetitions',
                        'active',
                        'image',
                        'actions',
                        'actuators',
                        'tags',
                    ],
                ],
            ]);
    }

    #[Test]
    public function users_should_not_get_data_tables_data(): void
    {
        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.badges.data'))
            ->assertForbidden();
    }
}
