<?php


namespace Gamify\Http\Requests;

use Gamify\Models\Question;
use Illuminate\Validation\Rule;

class QuestionUpdateRequest extends Request
{
    public function rules(): array
    {
        /** @var Question $question */
        $question = $this->route('question');

        return [
            'name' => [
                'required',
                'string',
                Rule::unique('questions')->ignore($question->id),
            ],
            'question' => [
                'required',
                'string',
            ],
            'solution' => [
                'nullable',
                'string',
            ],
            'type' => [
                'required',
                Rule::in([
                    Question::SINGLE_RESPONSE_TYPE,
                    Question::MULTI_RESPONSE_TYPE,
                ]),
            ],
            'status' => [
                'required',
                Rule::in([
                    Question::DRAFT_STATUS,
                    Question::PUBLISH_STATUS,
                ]),
            ],
            'hidden' => [
                'required',
                'boolean',
            ],
            'publication_date' => [
                'nullable',
                'date_format:Y-m-d H:i',
            ],

            // Tags
            'tags' => [
                'nullable',
                'array',
            ],
            'tags.*' => [
                'required',
                'alpha_dash',
            ],
        ];
    }

    public function tags(): array
    {
        return $this->input('tags', []);
    }
}
