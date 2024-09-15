<?php


namespace Tests\Feature\Listeners;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\BadgeActuators;
use Gamify\Events\SocialLogin;
use Gamify\Events\ProfileUpdated;
use Gamify\Listeners\AddBadgesOnProfileUpdated;
use Gamify\Listeners\AddBadgesOnUserLoggedIn;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Mockery;
use Tests\Feature\TestCase;

final class AddBadgesOnProfileUpdatedTest extends TestCase
{
    #[Test]
    public function it_should_listen_for_the_proper_events(): void
    {
        Event::fake();
        Event::assertListening(
            expectedEvent: ProfileUpdated::class,
            expectedListener: AddBadgesOnProfileUpdated::class
        );
    }

    #[Test]
    public function it_increments_badges_when_user_updates_profile(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::OnUserProfileUpdated,
        ]);

        /** @var ProfileUpdated $event */
        $event = Mockery::mock(ProfileUpdated::class);
        $event->user = $user;

        $listener = new AddBadgesOnProfileUpdated();
        $listener->handle($event);

        /** @phpstan-ignore-next-line */
        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)->repetitions);
    }

    #[Test]
    public function it_does_not_increment_badges_when_user_updates_profile(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::None,
        ]);

        /** @var ProfileUpdated $event */
        $event = Mockery::mock(ProfileUpdated::class);
        $event->user = $user;

        $listener = new AddBadgesOnProfileUpdated();
        $listener->handle($event);

        $this->assertNull($user->progressToCompleteTheBadge($badge));
    }
}
