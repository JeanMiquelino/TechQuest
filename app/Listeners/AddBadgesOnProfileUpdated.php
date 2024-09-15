<?php


namespace Gamify\Listeners;

use Gamify\Enums\BadgeActuators;
use Gamify\Events\ProfileUpdated;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;

class AddBadgesOnProfileUpdated
{
    public function handle(ProfileUpdated $event): void
    {
        $user = $event->user;

        Badge::query()
            ->whereActuators(BadgeActuators::OnUserProfileUpdated)
            ->get()
            ->each(function ($badge) use ($user) {
                Game::incrementBadgeCount($user, $badge);
            });
    }
}
