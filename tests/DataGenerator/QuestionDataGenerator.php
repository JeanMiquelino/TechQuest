<?php


namespace Tests\DataGenerator;

use Gamify\Models\Question;

class QuestionDataGenerator
{
    /**
     * Generate sample form request data.
     */
    public static function FormRequestData(array $overrides = []): array
    {
        /** @var Question $question */
        $question = Question::factory()->make();

        return array_merge([
            'name' => $question->name,
            'question' => $question->question,
            'type' => $question->type,
            'hidden' => $question->hidden,
            'status' => $question->status,

            // Tags
            'tags' => [
                'tag_1',
                'tag_2',
                'tag_3',
            ],

            // Choices
            'choices' => [
                [
                    'text' => 'option_0_is_correct',
                    'score' => '5',
                ],
                [
                    'text' => 'option_1_is_incorrect',
                    'score' => '-5',
                ],
            ],
        ], $overrides);
    }
}
