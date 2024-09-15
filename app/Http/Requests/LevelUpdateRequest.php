<?php


namespace Gamify\Http\Requests;

use Gamify\Models\Level;
use Illuminate\Validation\Rule;

class LevelUpdateRequest extends Request
{
    public function rules(): array
    {
        /** @var Level $level */
        $level = $this->route('level');

        return [
            'name' => [
                'required',
                'string',
                Rule::unique('levels')->ignore($level),
            ],
            'required_points' => [
                'required',
                'integer',
                Rule::unique('levels')->ignore($level),
            ],
            'active' => [
                'required',
                'boolean',
            ],
            'image' => [
                'image',
            ],
        ];
    }
}
