<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            "images" => "required|array|max:10",
            "images.*" => "image|mimes:jpeg,png,jpg,webp|max:10048"
        ];
    }

    public function messages()
    {
        return [
            "images.required" => "Es necesario que carges por lo menos una imagen",
            "images.max" => "Solo puedes subir como máximo 10 imagenes a la vez",
            "images.image" => "Formato de imagen incorrecto",
        ];
    }
}
