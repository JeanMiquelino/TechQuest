<?php


namespace Database\Factories;

use Gamify\Enums\Roles;
use Gamify\Models\User;
use Gamify\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function configure(): self
    {
        /** @phpstan-ignore-next-line */
        return $this->afterCreating(function (User $user) {
            UserProfile::factory()
                ->for($user)
                ->create();
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'username' => fake()->userName,
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'role' => Roles::Player,
        ];
    }

    public function admin(): Factory
    {
        return $this->state(function () {
            return [
                'role' => Roles::Admin,
            ];
        });
    }
}
