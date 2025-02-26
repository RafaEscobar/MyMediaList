<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class ChapterStoreRequest extends FormRequest
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
            "name" => "required|string|max:64|min:3",
            "score" => "required",
            "comment" => "string",
            "saga_id" => "required|integer|exists:sagas,id"
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 64 caracteres.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'score.required' => 'El puntaje es obligatorio.',
            'comment.string' => 'El comentario debe ser de tipo texto.',
            'saga_id.required' => 'La saga es obligatoria.',
            'saga_id.integer' => 'La saga debe ser un valor entero.',
            'saga_id.exists' => 'La saga seleccionada no existe.',
        ];
}

}
