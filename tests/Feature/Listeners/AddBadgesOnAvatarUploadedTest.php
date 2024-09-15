<?php


namespace Tests\Feature\Listeners;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Enums\BadgeActuators;
use Gamify\Events\AvatarUploaded;
use Gamify\Listeners\AddBadgesOnAvatarUploaded;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Support\Facades\Event;
use Mockery;
use Tests\Feature\TestCase;

final class AddBadgesOnAvatarUploadedTest extends TestCase
{
    #[Test]
    public function it_should_listen_for_the_proper_event(): void
    {
        Event::fake();
        Event::assertListening(
            expectedEvent: AvatarUploaded::class,
            expectedListener: AddBadgesOnAvatarUploaded::class
        );
    }

    #[Test]
    public function it_increments_badges_when_user_uploads_avatar(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::OnUserAvatarUploaded,
        ]);

        /** @var AvatarUploaded $event */
        $event = Mockery::mock(AvatarUploaded::class);
        $event->user = $user;

        $listener = new AddBadgesOnAvatarUploaded();
        $listener->handle($event);

        $this->assertEquals(1, $user->progressToCompleteTheBadge($badge)?->repetitions);
    }

    #[Test]
    public function it_does_not_increment_badges_when_user_uploads_avatar(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create([
            'actuators' => BadgeActuators::None,
        ]);

        /** @var AvatarUploaded $event */
        $event = Mockery::mock(AvatarUploaded::class);
        $event->user = $user;

        $listener = new AddBadgesOnAvatarUploaded();
        $listener->handle($event);

        $this->assertNull($user->progressToCompleteTheBadge($badge));
    }
}
