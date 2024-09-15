<?php


namespace Database\Factories;

use Gamify\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    protected $model = Level::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $color = fake()->unique()->safeColorName;

        return [
            'name' => 'Level '.$color,
            'required_points' => fake()->unique()->randomNumber() + 5,
            'active' => true,
        ];
    }
}
