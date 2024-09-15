<?php


namespace Tests\Feature\Listeners;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\BadgeActuators;
use Gamify\Events\SocialLogin;
use Gamify\Listeners\AddBadgesOnUserLoggedIn;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Mockery;
use Tests\Feature\TestCase;

final class AddBadgesOnUserLoggedInTest extends TestCase
{
    #[Test]
    public function it_should_listen_for_the_proper_event(): void
    {
        Event::fake();
        Event::assertListening(
            expectedEvent: Login::class,
            expectedListener: AddBadgesOnUserLoggedIn::class
        );
        Event::assertListening(
            expectedEvent: SocialLogin::class,
            expectedListener: AddBadgesOnUserLoggedIn::class
        );
    }

    #[Test]
    public function it_increments_badges_when_user_logs_in(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::OnUserLoggedIn,
        ]);

        /** @var Login $event */
        $event = Mockery::mock(Login::class);
        $event->user = $user;

        $listener = new AddBadgesOnUserLoggedIn();
        $listener->handle($event);

        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)?->repetitions);
    }

    #[Test]
    public function it_does_not_increment_badges_when_user_logs_in(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::None,
        ]);

        /** @var Login $event */
        $event = Mockery::mock(Login::class);
        $event->user = $user;

        $listener = new AddBadgesOnUserLoggedIn();
        $listener->handle($event);

        $this->assertNull($user->progressToCompleteTheBadge($badge));
    }

    #[Test]
    public function it_increments_badges_when_user_use_social_login(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::OnUserLoggedIn,
        ]);

        /** @var SocialLogin $event */
        $event = Mockery::mock(SocialLogin::class);
        $event->user = $user;

        $listener = new AddBadgesOnUserLoggedIn();
        $listener->handle($event);

        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)?->repetitions);
    }

    #[Test]
    public function it_does_not_increment_badges_when_user_use_social_login(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::None,
        ]);

        /** @var SocialLogin $event */
        $event = Mockery::mock(SocialLogin::class);
        $event->user = $user;

        $listener = new AddBadgesOnUserLoggedIn();
        $listener->handle($event);

        $this->assertNull($user->progressToCompleteTheBadge($badge));
    }
}
