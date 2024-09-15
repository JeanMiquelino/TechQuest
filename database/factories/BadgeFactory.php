<?php


namespace Database\Factories;

use Gamify\Enums\BadgeActuators;
use Illuminate\Database\Eloquent\Factories\Factory;

class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $color = fake()->unique()->safeColorName;

        return [
            'name' => $color,
            'description' => 'This badge is for people who think about '.$color.' :D',
            'required_repetitions' => 5,
            'active' => fake()->boolean,
            'actuators' => fake()->randomElement(BadgeActuators::getValues()),
        ];
    }

    public function active(): Factory
    {
        return $this->state(fn () => [
            'active' => true,
        ]);
    }

    public function inactive(): Factory
    {
        return $this->state(fn () => [
            'active' => false,
        ]);
    }
}
