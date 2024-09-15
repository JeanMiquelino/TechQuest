<?php


namespace Database\Factories;

use Gamify\Models\Question;
use Gamify\Models\QuestionChoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function configure(): self
    {
        /** @phpstan-ignore-next-line */
        return $this->afterCreating(function (Question $question) {
            if ($question->isPublished() || $question->isScheduled()) {
                QuestionChoice::factory()
                    ->for($question)
                    ->count(2)
                    ->state(new Sequence(
                        ['score' => fake()->numberBetween(1, 5)],
                        ['score' => fake()->numberBetween(-5, -1)],
                    ))
                    ->create();
            }
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
            'name' => fake()->sentence,
            'question' => fake()->paragraph,
            'solution' => fake()->paragraph,
            'type' => Question::SINGLE_RESPONSE_TYPE,
            'hidden' => fake()->boolean,
            'status' => Question::DRAFT_STATUS,
        ];
    }

    public function published(): Factory
    {
        return $this->state(function () {
            return [
                'status' => Question::PUBLISH_STATUS,
                'publication_date' => now()->subWeek(),
            ];
        });
    }

    public function scheduled(): Factory
    {
        return $this->state(function () {
            return [
                'status' => Question::FUTURE_STATUS,
                'publication_date' => now()->addWeek(),
            ];
        });
    }

    public function public(): Factory
    {
        return $this->state(function () {
            return [
                'hidden' => false,
            ];
        });
    }

    public function private(): Factory
    {
        return $this->state(function () {
            return [
                'hidden' => true,
            ];
        });
    }
}
