<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => "required|max:32|min:3",
            'last_name' => "required|max:80|min:3",
            'email' => "required|email|max:100",
            'password' => "required|max:16|min:8",
            'date_birth' => "required|date",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El nombre es obligatorio.",
            "name.max" => "El nombre es demasiado largo.",
            "name.min" => "El nombre es muy corto",
            "last_name.required" => "Los apellidos son obligatorios.",
            "last_name.max" => "Los apellidos son demasiado largos",
            "last_name.min" => "Los apellidos son muy cortos",
            "email.required" => "El correo electrónico es obligatorio.",
            "email.email" => "El correo electrónico no tiene el formato correcto.",
            "email.max" => "El correo electrónico es demasiado largo.",
            "password.required" => "La contraseña es obligatoria.",
            "password.max" => "La contraseña es demasiado grande",
            "password.min" => "La contraseña es muy corta.",
            "date_birth.required" => "La fecha de nacimiento es obligatoria.",
            "date_birth.email" => "La fecha de nacimiento no tiene el formato correcto.",
        ];
    }
}
