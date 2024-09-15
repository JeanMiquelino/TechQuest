<?php


namespace Gamify\Http\Requests;

use Illuminate\Validation\Rule;

class LevelCreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('levels'),
            ],
            'required_points' => [
                'required',
                'integer',
                Rule::unique('levels'),
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
