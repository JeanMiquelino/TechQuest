<?php


namespace Database\Factories;

use Gamify\Models\QuestionChoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionChoiceFactory extends Factory
{
    protected $model = QuestionChoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->sentence,
            'score' => fake()->numberBetween(1, 10),
        ];
    }

    public function correct(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'text' => 'correct: '.$attributes['text'],
            ];
        });
    }

    public function incorrect(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'text' => 'incorrect: '.$attributes['text'],
                'score' => -1 * $attributes['score'],
            ];
        });
    }
}
