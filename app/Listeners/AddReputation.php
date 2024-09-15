<?php


namespace Gamify\Listeners;

use Gamify\Events\QuestionAnswered;

class AddReputation
{
    public function handle(QuestionAnswered $event): void
    {
        $user = $event->user;
        $pointsEarned = $event->points;
        $questionName = $event->question->name;

        $user->points()->create([
            'points' => $pointsEarned,
            'description' => "earned $pointsEarned points for answering the question '$questionName'",
        ]);
    }
}
