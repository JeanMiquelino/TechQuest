<?php


namespace Database\Factories;

use Gamify\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => fake()->text,
            'date_of_birth' => fake()->dateTime,
            'twitter' => fake()->url,
            'facebook' => fake()->url,
            'linkedin' => fake()->url,
            'github' => fake()->url,
        ];
    }
}
