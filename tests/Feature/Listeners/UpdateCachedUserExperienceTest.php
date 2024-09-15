<?php


namespace Tests\Feature\Listeners;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Events\PointCreated;
use Gamify\Events\PointDeleted;
use Gamify\Listeners\UpdateCachedUserExperience;
use Gamify\Models\Point;
use Gamify\Models\User;
use Illuminate\Support\Facades\Event;
use Tests\Feature\TestCase;

final class UpdateCachedUserExperienceTest extends TestCase
{
    #[Test]
    public function it_should_listen_for_the_proper_event(): void
    {
        Event::fake();
        Event::assertListening(
            expectedEvent: PointCreated::class,
            expectedListener: UpdateCachedUserExperience::class
        );
        Event::assertListening(
            expectedEvent: PointDeleted::class,
            expectedListener: UpdateCachedUserExperience::class
        );
    }

    #[Test]
    public function it_updates_the_cached_value_on_point_creation(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Point::factory()
            ->for($user)
            ->create([
                'points' => 5,
            ]);

        $this->assertEquals(5, $user->experience);
    }

    #[Test]
    public function it_updates_the_cached_value_on_point_deletion(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $point = Point::factory()
            ->for($user)
            ->create([
                'points' => 5,
            ]);

        $this->assertEquals(5, $user->experience);

        $point->delete();

        $this->assertEquals(0, $user->experience);
    }
}
