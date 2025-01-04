<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class FavStoreRequest extends FormRequest
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
        $data = ['type' => 'in:media,saga|required'];
        $data['id'] = ($this->type == 'media') ? 'required|numeric|exists:entertainment,id' : 'required|numeric|exists:sagas,id';
        return $data;
    }

    public function messages(): array
    {
        return [
            'type.in' => 'El tipo debe ser uno de los siguientes valores: media o saga.',
            'type.required' => 'El campo tipo es obligatorio.',
            'id.required' => 'El campo ID es obligatorio.',
            'id.numeric' => 'El campo ID debe ser un valor numérico.',
            'id.exists' =>  ($this->type == 'media') ? 'El ID debe existir en las tabla -entretenimiento-' : 'El ID debe existir en las tabla -sagas-',
        ];
    }

}
