<?php


namespace Gamify\Listeners;

use Gamify\Events\PointCreated;
use Gamify\Events\PointDeleted;
use Illuminate\Support\Facades\Cache;

class UpdateCachedUserExperience
{
    public function handle(PointCreated|PointDeleted $event): void
    {
        $user = $event->point->user;

        Cache::put('user_experience_'.$user->id, $user->points()->sum('points'), 600);
    }
}
