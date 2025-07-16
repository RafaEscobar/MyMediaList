<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class ContentStoreRequest extends FormRequest
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
            'name' => 'required|string|max:120',
            'status' => 'integer',
            'isFavorite' => 'boolean',
            'score' => 'numeric',
            'comment' => 'string',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El formato del nombre es incorrecto.',
            'name.max' => 'El nombre es demasiado largo.',
            'status.integer' => 'El formato del estatus es incorrecto.',
            'isFavorite.boolean' => 'El formato del estatus "favorito" es incompatible.',
            'score.numeric' => 'El formato de la calificación es incorrecto.',
            'comment.string' => 'El formato del comentario es incorrecto.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'El formato de la categoría es incorrecto.',
            'category_id.exists' => 'La categoría no existe.',
            'user_id.required' => 'El usuario asociado es obligatorio.',
            'user_id.integer' => 'El formato del identificador del usuario es incorrecto.',
            'user_id.exists' => 'Error de asociación con el usuario.',
        ];
    }
}
