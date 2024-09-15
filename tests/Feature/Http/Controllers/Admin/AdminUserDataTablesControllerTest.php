<?php


namespace Tests\Feature\Http\Controllers\Admin;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\Roles;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class AdminUserDataTablesControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();

        $this->user = $user;
    }

    #[Test]
    public function admins_should_get_data_tables_data(): void
    {
        $this->user->role = Roles::Admin();

        $users = User::factory()
            ->count(3)
            ->create();

        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.users.data'))
            ->assertSuccessful()
            ->assertJsonCount($users->count() + 1, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'username',
                        'name',
                        'email',
                        'role',
                        'level',
                        'experience',
                    ],
                ],
            ]);
    }

    #[Test]
    public function users_should_not_get_data_tables_data(): void
    {
        $this
            ->actingAs($this->user)
            ->ajaxGet(route('admin.users.data'))
            ->assertForbidden();
    }
}
