<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class MediaImagesRequest extends FormRequest
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
            'images' => 'array|required',
            'type' => 'required|exists:subtypes,id'
        ];
    }
}
