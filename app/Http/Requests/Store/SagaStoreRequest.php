<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class SagaStoreRequest extends FormRequest
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
            'num_caps' => 'required|integer',
            'season' => 'required|integer',
            'final_comment' => 'string|nullable',
            'score' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'status_id' => 'required|integer|exists:statuses,id',
            'pending_priority_id' => 'nullable|integer|exists:pending_priorities,id',
            'post_view_priority_id' => 'nullable|integer|exists:post_view_priorities,id',
            'user_id' => 'required|integer|exists:users,id',
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
            'num_caps.required' => 'El número de capítulos es obligatorio.',
            'num_caps.integer' => 'El número de capítulos debe ser un valor entero.',
            'season.required' => 'La temporada es obligatoria.',
            'season.integer' => 'La temporada debe ser un valor entero.',
            'final_comment.string' => 'El comentario final debe ser de tipo texto.',
            'final_comment.nullable' => 'El comentario final es opcional.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un valor entero.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
            'status_id.required' => 'El estado es obligatorio.',
            'status_id.integer' => 'El estado debe ser un valor entero.',
            'status_id.exists' => 'El estado seleccionado no existe.',
            'pending_priority_id.integer' => 'La prioridad debe ser un valor entero.',
            'pending_priority_id.exists' => 'La prioridad seleccionada no existe.',
            'post_view_priority_id.integer' => 'La prioridad debe ser un valor entero.',
            'post_view_priority_id.exists' => 'La prioridad seleccionada no existe.',
            'image.required' => 'La imagen es obligatoria.',
            'image.image' => 'El archivo debe ser una imagen.',
        ];
    }

}
