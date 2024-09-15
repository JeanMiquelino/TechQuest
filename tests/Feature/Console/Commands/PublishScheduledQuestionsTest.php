<?php


namespace Tests\Feature\Console\Commands;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Question;
use Tests\Feature\TestCase;

final class PublishScheduledQuestionsTest extends TestCase
{
    #[Test]
    public function it_should_not_publish_questions_if_it_is_not_the_right_time_yet(): void
    {
        /** @var Question $question */
        $question = Question::factory()
            ->scheduled()
            ->create([
                'publication_date' => now()->addWeek(),
            ]);

        /* @phpstan-ignore-next-line */
        $this->artisan('gamify:publish')
            ->expectsOutput('No scheduled questions were ready for publication!')
            ->assertSuccessful();

        $question->refresh();

        $this->assertEquals(Question::FUTURE_STATUS, $question->status);
    }

    #[Test]
    public function it_should_raise_an_error_when_questions_can_not_be_published(): void
    {
        // Create a question without choices().
        // It must be done in two steps, otherwise the QuestionFactory would create a Question with choices().
        /** @var Question $question */
        $question = Question::factory()->create();
        $question->publication_date = now()->subWeek();
        $question->status = Question::FUTURE_STATUS;
        $question->save();

        /* @phpstan-ignore-next-line */
        $this->artisan('gamify:publish')
            ->expectsOutput("Scheduled question '{$question->name}' can not be published, reason: Question does not meet the publication requirements")
            ->assertFailed();

        $question->refresh();

        $this->assertEquals(Question::FUTURE_STATUS, $question->status);
    }

    #[Test]
    public function it_should_sent_two_questions_to_publication(): void
    {
        $questions = Question::factory()
            ->scheduled()
            ->count(2)
            ->create([
                'publication_date' => now()->subWeek(),
            ]);

        /* @phpstan-ignore-next-line */
        $this->artisan('gamify:publish')
            ->expectsOutput('2 of 2 scheduled questions were sent to publication successfully!')
            ->assertSuccessful();

        /** @var Question $want */
        foreach ($questions as $want) {
            $want->refresh();

            $this->assertEquals(Question::PUBLISH_STATUS, $want->status);
        }
    }
}
