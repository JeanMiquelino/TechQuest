<?php


namespace Database\Seeders;

use Gamify\Enums\Roles;
use Gamify\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete();

        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@domain.local',
                'password' => 'admin',
                'role' => Roles::Admin,
            ],
            [
                'username' => 'player',
                'email' => 'player@domain.local',
                'password' => 'player',
                'role' => Roles::Player,
            ],
        ];

        User::factory()->createMany($users);
    }
}
