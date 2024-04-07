<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "isbn" => "required|integer",
            "value" => "required|numeric",

            'stores' => 'nullable|array',
            'stores.*' => 'nullable|integer|exists:stores,id',
        ];
    }
}
