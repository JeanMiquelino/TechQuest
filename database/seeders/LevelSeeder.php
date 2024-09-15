<?php


namespace Database\Seeders;

use Gamify\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Create four Levels in order to start your Gamify app
     */
    public function run(): void
    {
        foreach (range(1, 4) as $index) {
            Level::factory()
                ->create([
                    'name' => 'Level '.$index,
                    'required_points' => ($index * 10),
                ]);
        }
    }
}
