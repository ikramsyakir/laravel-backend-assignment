<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordGenerateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'length' => ['sometimes', 'integer', 'min:8'],
            'lowercase' => ['sometimes', 'boolean'],
            'uppercase' => ['sometimes', 'boolean'],
            'number' => ['sometimes', 'boolean'],
            'symbol' => ['sometimes', 'boolean'],
        ];
    }
}
