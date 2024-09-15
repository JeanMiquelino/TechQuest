<?php


namespace Tests\Feature\Models;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Question;
use Gamify\Models\User;
use Gamify\Models\UserResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TestCase;

final class UserResponseTest extends TestCase
{
    use WithFaker;

    #[Test]
    #[DataProvider('providesScoreForUserResponseTest')]
    public function it_should_return_the_user_response_score_of_a_question(
        int $score,
        int $want,
    ): void {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        /** @var User $user */
        $user = User::factory()
            ->create();

        $user->answeredQuestions()->attach($question,
            UserResponse::asArray(
                score: $score,
                choices: $question->choices()->pluck('id')->toArray(),
            )
        );

        /** @phpstan-ignore-next-line */
        $response = $user->answeredQuestions()
            ->where('question_id', $question->id)
            ->first()
            ->response;

        $this->assertEquals($want, $response->score());
    }

    public static function providesScoreForUserResponseTest(): \Generator
    {
        yield 'score < 0' => [
            'score' => -2,
            'want' => 1,
        ];

        yield 'score == 0' => [
            'score' => 0,
            'want' => 1,
        ];

        yield 'score > 0' => [
            'score' => 5,
            'want' => 5,
        ];
    }

    #[Test]
    public function it_should_return_the_user_response_choices_of_a_question(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        /** @var User $user */
        $user = User::factory()
            ->create();

        $choices = [1, 2];

        $user->answeredQuestions()->attach($question,
            UserResponse::asArray(
                score: $this->faker->numberBetween(-10, 10),
                choices: $choices,
            )
        );

        /** @phpstan-ignore-next-line */
        $response = $user->answeredQuestions()
            ->where('question_id', $question->id)
            ->first()
            ->response;

        $this->assertEquals($choices, $response->choices());
    }

    #[Test]
    public function it_should_return_if_a_choice_is_within_the_user_response_of_a_question(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        /** @var User $user */
        $user = User::factory()
            ->create();

        $choices = [2];

        $user->answeredQuestions()->attach($question,
            UserResponse::asArray(
                score: $this->faker->numberBetween(-10, 10),
                choices: $choices,
            )
        );

        /** @phpstan-ignore-next-line */
        $response = $user->answeredQuestions()
            ->where('question_id', $question->id)
            ->first()
            ->response;

        $this->assertFalse($response->hasChoice(1));

        $this->assertTrue($response->hasChoice(2));
    }
}
