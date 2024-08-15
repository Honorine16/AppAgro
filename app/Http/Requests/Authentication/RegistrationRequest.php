<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|min:3|max:128|unique:users',
            'email' => 'required|min:3|max:128|email|unique:users',
            'password' => 'required|min:6|max:64',
            'passwordConfirm' => 'same:password',
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
            'name.required' => 'Le nom est requise',
            'name.min' => 'Le nom doit contenir au minimum 3 caractères',
            'name.max' => 'Le nom doit contenir au maximum 128 caractères',
            'name.unique' => 'Nom déjà utiliser',
            // ----------------------------------------------------------------
            'email.email' => 'L\'adresse email est invalide',
            'email.required' => 'L\'adresse email est requise',
            'email.min' => 'L\'email doit contenir au minimum 3 caractères',
            'email.max' => 'L\'email doit contenir au maximum 128 caractères',
            'email.unique' => 'Email déjà utiliser',
            // ----------------------------------------------------------------
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au minimum 3 caractères',
            'password.max' => 'Le mot de passe doit contenir au maximum 128 caractères',
            'password_confirm.same' => 'Les deux mot de passe ne sont pas identiques',
        ];
    }
}
