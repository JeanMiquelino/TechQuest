<?php


namespace Gamify\Listeners;

use Gamify\Enums\BadgeActuators;
use Gamify\Events\AvatarUploaded;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;

class AddBadgesOnAvatarUploaded
{
    public function handle(AvatarUploaded $event): void
    {
        $user = $event->user;

        Badge::query()
            ->whereActuators(BadgeActuators::OnUserAvatarUploaded)
            ->get()
            ->each(function ($badge) use ($user) {
                Game::incrementBadgeCount($user, $badge);
            });
    }
}
