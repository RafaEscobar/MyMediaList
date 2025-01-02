<?php

namespace App\Http\Requests\Get;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => "required|email|max:100",
            'password' => "required|max:16|min:8"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "El correo electrónico es obligatorio.",
            "email.email" => "El correo electrónico no tiene el formato correcto.",
            "email.max" => "El correo electrónico es demasiado largo.",
            "password.required" => "La contraseña es obligatoria.",
            "password.max" => "La contraseña es demasiado grande",
            "password.min" => "La contraseña es muy corta."
        ];
    }
}
