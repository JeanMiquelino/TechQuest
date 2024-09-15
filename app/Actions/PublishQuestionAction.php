<?php


namespace Gamify\Actions;

use Gamify\Exceptions\QuestionPublishingException;
use Gamify\Models\Question;

final class PublishQuestionAction
{
    /**
     * @throws QuestionPublishingException
     */
    public function execute(Question $question): void
    {
        $question->publish();
    }
}
