<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ];
    }


    public function prepareForValidation(): void
    {
        $this->merge([
            'email' => mb_strtolower(trim($this->email)),
        ]);
    }
}
