<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class MediumStoreRequest extends FormRequest
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
            'title' => 'required|string|max:64|min:3',
            'score' => 'nullable',
            'comment' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'status_id' => 'required|integer|exists:statuses,id',
            'user_id' => 'required|integer|exists:users,id',
            'pending_priority_id' => 'nullable|integer|exists:pending_priorities,id',
            'post_view_priority_id' => 'nullable|integer|exists:post_view_priorities,id',
            'image' => 'required|image'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.max' => 'El título no puede tener más de 64 caracteres.',
            'title.min' => 'El título debe tener al menos 3 caracteres.',
            'score.nullable' => 'El puntaje es opcional.',
            'comment.nullable' => 'El comentario es opcional.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un número entero.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
            'status_id.required' => 'El estado es obligatorio.',
            'status_id.integer' => 'El estado debe ser un número entero.',
            'status_id.exists' => 'El estado seleccionado no existe.',
            'user_id.required' => 'El usuario es obligatorio.',
            'user_id.integer' => 'El usuario debe ser un número entero.',
            'user_id.exists' => 'El usuario seleccionado no existe.',
            'pending_priority_id.integer' => 'La prioridad debe ser un número entero.',
            'pending_priority_id.exists' => 'La prioridad seleccionada no existe.',
            'post_view_priority_id.integer' => 'La prioridad debe ser un número entero.',
            'post_view_priority_id.exists' => 'La prioridad seleccionada no existe.',
            'image.required' => 'La imagen es obligatoria.',
            'image.image' => 'El archivo debe ser una imagen.'
        ];
}

}
