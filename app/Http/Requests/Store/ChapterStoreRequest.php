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
            'name' => 'required|string|max:120',
            'score' => 'required|numeric',
            'comment' => 'string',
            'content_id' => 'required|integer|exists:contents,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El formato del nombre es incorrecto.',
            'name.max' => 'El nombre es demasiado largo.',
            'score.required' => 'La calificación del capítulo es obligatoria.',
            'score.numeric' => 'El formato de la calificación es incorrecto.',
            'comment.string' => 'El formato del comentario es incorrecto.',
            'content_id.required' => 'Es necesario tener un contenido asociado.',
            'content_id.integer' => 'El formato del identificador del contenido es incorrecto.',
            'content_id.exists' => 'No existe un contenido asociado con ese identificador.',
        ];
    }
}

