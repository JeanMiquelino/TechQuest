<?php


namespace Gamify\Events;

use Gamify\Models\Question;
use Illuminate\Foundation\Events\Dispatchable;

class QuestionPublished
{
    use Dispatchable;

    public Question $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }
}
