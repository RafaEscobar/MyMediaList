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
            'title' => 'required|string|max:32|min:3',
            'score' => 'double|nullable',
            'comment' => 'text|nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'status_id' => 'required|integer|exists:statuses,id',
            'user_id' => 'required|integer|exists:suers,id',
            'priority_id' => 'required|integer|exists:priorities,id',
        ];
    }
}
