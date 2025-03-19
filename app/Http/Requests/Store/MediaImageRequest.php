<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class MediaImageRequest extends FormRequest
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
            'image' => 'image|required',
            'type' => 'required|exists:subtypes,id'
        ];
    }

    public function messages()
    {
        return [
            "image.image" => "La imagen tiene un formato incorrecto",
            "image.request" => "Debes agregar por lo menos una imagen",
            "type.request" => "El tipo es obligatorio",
            "type.exists" => "El tipo es erroneo"
        ];
    }
}
