<?php


namespace Gamify\Listeners;

use Gamify\Enums\BadgeActuators;
use Gamify\Events\QuestionAnswered;
use Gamify\Libs\Game\Game;
use Gamify\Models\Badge;

/**
 * Trigger Badges with an actuator related to Questions (OnQuestion[*]) and the mathcing tags.
 */
class AddBadgesOnQuestionAnswered
{
    public function handle(QuestionAnswered $event): void
    {
        $user = $event->user;

        Badge::query()
            ->whereIn('actuators', [
                BadgeActuators::OnQuestionAnswered,
                ($event->correctness === true)
                    ? BadgeActuators::OnQuestionCorrectlyAnswered
                    : BadgeActuators::OnQuestionIncorrectlyAnswered,
            ])
            ->when($event->question->tagArrayNormalized, function ($query) use ($event) {
                $query->withAnyTags($event->question->tagArrayNormalized);
            }, function ($query) {
                $query->isNotTagged();
            })
            ->get()
            ->each(function ($badge) use ($user) {
                Game::incrementBadgeCount($user, $badge);
            });
    }
}
