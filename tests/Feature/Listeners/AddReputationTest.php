<?php


namespace Tests\Feature\Listeners;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Events\QuestionAnswered;
use Gamify\Listeners\AddReputation;
use Gamify\Models\Question;
use Gamify\Models\User;
use Illuminate\Support\Facades\Event;
use Mockery;
use Tests\Feature\TestCase;

final class AddReputationTest extends TestCase
{
    #[Test]
    public function it_should_listen_for_the_proper_event(): void
    {
        Event::fake();
        Event::assertListening(
            expectedEvent: QuestionAnswered::class,
            expectedListener: AddReputation::class
        );
    }

    #[Test]
    public function it_increments_the_user_experience(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Question $question */
        $question = Question::factory()
            ->published()
            ->create();

        /** @var QuestionAnswered $event */
        $event = Mockery::mock(QuestionAnswered::class);
        $event->user = $user;
        $event->question = $question;
        $event->points = 5;
        $event->correctness = true;

        $listener = new AddReputation();
        $listener->handle($event);

        $this->assertEquals(5, $user->experience);
    }
}
