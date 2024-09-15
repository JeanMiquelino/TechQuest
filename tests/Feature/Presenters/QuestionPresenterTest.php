<?php


namespace Tests\Feature\Presenters;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Question;
use Gamify\Models\User;
use Tests\Feature\TestCase;

final class QuestionPresenterTest extends TestCase
{
    #[Test]
    public function it_should_return_not_available_when_the_creator_is_not_set(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        $this->assertEquals('N/A', $question->present()->creator());
    }

    #[Test]
    public function it_should_return_the_creator_of_a_question(): void
    {
        /** @var Question $question */
        $question = Question::factory()->make();
        $input_data = [
            'name' => $question->name,
            'question' => $question->question,
            'type' => $question->type,
            'hidden' => $question->hidden,
            'status' => $question->status,
            'choices' => [
                [
                    'text' => 'option_0_is_correct',
                    'score' => '5',
                ],
                [
                    'text' => 'option_1_is_incorrect',
                    'score' => '-5',
                ],
            ],
        ];

        /** @var User $user */
        $user = User::factory()
            ->admin()
            ->create();

        $this
            ->actingAs($user)
            ->post(route('admin.questions.store'), $input_data)
            ->assertValid();

        /** @var Question $newQuestion */
        $newQuestion = Question::where([
            'name' => $question->name,
            'question' => $question->question,
            'type' => $question->type,
            'hidden' => $question->hidden,
            'status' => $question->status,
        ])->first();

        $this->assertEquals($user->username, $newQuestion->present()->creator());
    }

    #[Test]
    public function it_should_return_not_available_when_the_updater_is_not_set(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        $this->assertEquals('N/A', $question->present()->updater());
    }

    #[Test]
    public function it_should_return_the_updater_of_a_question(): void
    {
        /** @var Question $question */
        $question = Question::factory()->create([
            'name' => 'foo',
        ]);

        $input_data = [
            'name' => 'Bar',
            'question' => $question->question,
            'type' => $question->type,
            'hidden' => $question->hidden,
            'status' => $question->status,
        ];

        /** @var User $user */
        $user = User::factory()
            ->admin()
            ->create();

        $this
            ->actingAs($user)
            ->put(route('admin.questions.update', $question), $input_data)
            ->assertValid();

        $question->refresh();

        $this->assertEquals($user->username, $question->present()->updater());
    }
}
