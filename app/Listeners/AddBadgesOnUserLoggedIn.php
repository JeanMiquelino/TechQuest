<?php


namespace Gamify\Listeners;

use Gamify\Enums\BadgeActuators;
use Gamify\Events\SocialLogin;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Auth\Events\Login;

class AddBadgesOnUserLoggedIn
{
    public function handle(Login|SocialLogin $event): void
    {
        /** @var User $user */
        $user = $event->user;

        Badge::query()
            ->whereActuators(BadgeActuators::OnUserLoggedIn)
            ->get()
            ->each(function ($badge) use ($user) {
                Game::incrementBadgeCount($user, $badge);
            });
    }
}
