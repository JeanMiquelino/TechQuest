<?php


namespace Gamify\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Gamify\Enums\BadgeActuators;
use Illuminate\Validation\Rule;

class BadgeUpdateRequest extends Request
{
    public function rules(): array
    {
        $badge = $this->route('badge');

        return [
            'name' => [
                'required',
                'string',
                Rule::unique('badges')->ignore($badge),
            ],
            'description' => [
                'required',
            ],
            'required_repetitions' => [
                'required',
                'integer',
                'min:1',
            ],
            'active' => [
                'required',
                'boolean',
            ],
            'actuators' => [
                'required',
                new EnumValue(BadgeActuators::class),
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
            'image' => [
                'image',
            ],
        ];
    }

    public function name(): string
    {
        return $this->input('name');
    }

    public function description(): string
    {
        return $this->input('description');
    }

    public function repetitions(): int
    {
        return $this->input('required_repetitions');
    }

    public function active(): bool
    {
        return $this->input('active');
    }

    public function actuators(): string
    {
        return $this->input('actuators');
    }

    public function tags(): array
    {
        return $this->input('tags', []);
    }
}
