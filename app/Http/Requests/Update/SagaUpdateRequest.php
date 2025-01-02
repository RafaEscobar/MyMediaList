<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class SagaUpdateRequest extends FormRequest
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
                'num_caps' => 'required|integer',
                'season' => 'required|integer',
                'final_comment' => 'text|nullable',
                'category_id' => 'required|integer|exists:categories,id',
                'status_id' => 'required|integer|exists:statuses,id',
                'priority_id' => 'required|integer|exists:priorities,id'
            ];
        } else if ($method == 'PATCH') {
            return [
                'num_caps' => 'sometimes|required|integer',
                'season' => 'sometimes|required|integer',
                'final_comment' => 'sometimes|text|nullable',
                'category_id' => 'sometimes|required|integer|exists:categories,id',
                'status_id' => 'sometimes|required|integer|exists:statuses,id',
                'priority_id' => 'sometimes|required|integer|exists:priorities,id'
            ];
        }
    }
}
