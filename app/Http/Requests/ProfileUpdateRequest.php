<?php


namespace Gamify\Http\Requests;

class ProfileUpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'bio' => [
                'nullable',
                'string',
            ],
            'date_of_birth' => [
                'nullable',
                'date',
            ],
            'twitter' => [
                'nullable',
                'url',
            ],
            'facebook' => [
                'nullable',
                'url',
            ],
            'linkedin' => [
                'nullable',
                'url',
            ],
            'github' => [
                'nullable',
                'url',
            ],
            'avatar' => [
                'image',
            ],
        ];
    }
}
