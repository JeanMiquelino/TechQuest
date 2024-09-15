<?php


namespace Gamify\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Gamify\Enums\QuestionActuators;
use Illuminate\Validation\Rule;

class QuestionActionCreateRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'badge_id' => ['required', Rule::exists('badges', 'id')],
            'when' => ['required', new EnumValue(QuestionActuators::class, false)],
        ];
    }
}
