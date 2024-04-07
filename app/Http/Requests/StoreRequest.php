<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "address" => "required|string|max:255",
            "active" => "nullable|boolean",

            'books' => 'nullable|array',
            'books.*' => 'nullable|integer|exists:books,id',
        ];
    }
}
