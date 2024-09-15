<?php


namespace Gamify\Events;

use Gamify\Models\Question;
use Gamify\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuestionAnswered
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public User $user,
        public Question $question,
        public int $points,
        public bool $correctness
    ) {
        //
    }
}
