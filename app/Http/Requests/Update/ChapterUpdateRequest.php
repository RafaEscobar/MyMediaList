<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class ChapterUpdateRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                "name" => "required|string|max:42|min:3",
                "score" => "required|double",
                "comment" => "text|nullable",
                "saga_id" => "required|integer|exists:sagas,id"
            ];
        } else if ($method == 'PATCH') {
            return [
                "name" => "sometimes|required|string|max:42|min:3",
                "score" => "sometimes|required|double",
                "comment" => "sometimes|text|nullable",
                "saga_id" => "sometimes|required|integer|exists:sagas,id"
            ];
        }
    }
}
