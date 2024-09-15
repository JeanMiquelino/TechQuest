<?php


namespace Gamify\Http\Requests;

class QuestionAnswerRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'choices' => ['required'],
        ];
    }
}
