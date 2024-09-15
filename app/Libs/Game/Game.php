<?php


namespace Gamify\Libs\Game;

use Gamify\Models\Badge;
use Gamify\Models\User;
use Gamify\Notifications\BadgeUnlocked;
use Illuminate\Support\Collection;

class Game
{
    public static function incrementBadgeCount(User $user, Badge $badgeToIncrement): void
    {
        if ($user->hasUnlockedBadge($badgeToIncrement)) {
            return;
        }

        $progress = $user->progressToCompleteTheBadge($badgeToIncrement);
        $repetitions = $progress?->repetitions ?? 0;
        $repetitions++;

        $badgeData = ['repetitions' => $repetitions];

        $user->badges()->syncWithoutDetaching([
            $badgeToIncrement->id => $badgeData,
        ]);

        if ($repetitions === $badgeToIncrement->required_repetitions) {
            self::unlockBadgeFor($user, $badgeToIncrement);
        }
    }

    public static function unlockBadgeFor(User $user, Badge $badge): void
    {
        if ($user->hasUnlockedBadge($badge)) {
            return;
        }

        $badgeData = [
            'repetitions' => $badge->required_repetitions,
            'unlocked_at' => now(),
        ];

        $user->badges()->syncWithoutDetaching([
            $badge->id => $badgeData,
        ]);

        $user->notify(new BadgeUnlocked($badge));
    }

    public static function getTopExperiencedPlayers(int $maxNumberOfPlayers = 10): Collection
    {
        return User::query()
            ->player()
            ->select(['username', 'name'])
            ->withSum('points as total_points', 'points')
            ->orderByDesc('total_points')
            ->take($maxNumberOfPlayers)
            ->get()
            ->map(function ($user) {
                return [
                    'username' => $user->username,
                    'name' => $user->name,
                    'experience' => $user->total_points ?? 0,
                    'level' => $user->level,
                ];
            });
    }
}
