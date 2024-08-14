<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // fonction d'autorisation 
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // fonction de validation
    public function rules(): array
    {
        return [
            'email' => 'required|min:3|max:128|email',
            'password' => 'required|min:6|max:64',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.email' => 'L\'adrresse email est invalide',
            'email.required' => 'L\'adrresse email est requise',
            'email.min' => 'L\'email doit contenir au minimum 3 caractères',
            'email.max' => 'L\'email doit contenir au maximum 128 caractères',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au minimum 3 caractères',
            'password.max' => 'Le mot de passe doit contenir au maximum 128 caractères',
        ];
    }
}
