<?php


namespace Gamify\Http\Controllers\Admin;

use Gamify\Http\Requests\RewardBadgeRequest;
use Gamify\Http\Requests\RewardExperienceRequest;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;
use Gamify\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminRewardController extends AdminController
{
    public function index(): View
    {
        $users = User::query()
            ->player()
            ->pluck('username', 'username');

        $badges = Badge::query()
            ->active()
            ->pluck('name', 'id');

        return view('admin.reward.index')
            ->with('users', $users)
            ->with('badges', $badges);
    }

    public function giveExperience(RewardExperienceRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::where('username', $request->usernameToReward())
            ->firstOrFail();

        $user->points()->create([
            'points' => $request->experience(),
            'description' => $request->reason(),
        ]);

        return redirect()->route('admin.rewards.index')
            ->with('success',
                trans('admin/reward/messages.experience_given.success', [
                    'username' => $user->username,
                    'points' => $request->experience(),
                ]));
    }

    public function giveBadge(RewardBadgeRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::where('username', $request->usernameToReward())
            ->firstOrFail();

        /** @var Badge $badge */
        $badge = Badge::findOrFail($request->badge());

        Game::incrementBadgeCount(
            user: $user,
            badgeToIncrement: $badge
        );

        return redirect()->route('admin.rewards.index')
            ->with('success',
                trans('admin/reward/messages.badge_given.success', [
                    'username' => $user->username,
                    'badge' => $badge->name,
                ]));
    }
}
