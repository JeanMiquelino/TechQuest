<?php


namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Gamify\Notifications\BadgeUnlocked;
use Illuminate\Notifications\Notification;
use Tests\Feature\TestCase;

final class MarkNotificationAsReadControllerTest extends TestCase
{
    #[Test]
    public function it_should_mark_a_notification_as_read(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        // Let's add two notifications.
        $user->notify(new BadgeUnlocked($badge));
        $user->notify(new BadgeUnlocked($badge));

        // We want to mark only one as read.
        /** @var Notification $notification */
        $notification = $user->unreadNotifications->first();

        $this
            ->actingAs($user)
            ->patch(route('notifications.read'), ['id' => $notification->id])
            ->assertNoContent();

        $this->assertCount(1, $user->refresh()->unreadNotifications);
    }

    #[Test]
    public function it_should_mark_all_notifications_as_read(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Badge $badge */
        $badge = Badge::factory()->create();

        // Let's add two notifications.
        $user->notify(new BadgeUnlocked($badge));
        $user->notify(new BadgeUnlocked($badge));

        $this
            ->actingAs($user)
            ->patch(route('notifications.read'))
            ->assertNoContent();

        $this->assertCount(0, $user->refresh()->unreadNotifications);
    }
}
