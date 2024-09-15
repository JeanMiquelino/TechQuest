<?php


namespace Database\Seeders;

use Gamify\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Badge::factory()
            ->count(5)
            ->create();
    }
}
