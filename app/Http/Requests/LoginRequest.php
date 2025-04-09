<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'email.required' => 'The email field is required.',
    //         'email.email' => 'Please provide a valid email address.',
    //         'email.max' => 'The email should not exceed 255 characters.',
    //         'password.required' => 'The password field is required.',
    //         'password.min' => 'The password must be at least 8 characters long.',
    //     ];
    // }
}
