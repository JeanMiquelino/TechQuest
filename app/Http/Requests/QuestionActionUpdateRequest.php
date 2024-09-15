<?php


namespace Gamify\Http\Requests;

class QuestionActionUpdateRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
