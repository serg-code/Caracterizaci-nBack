<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rol' => 'required|exists:roles,name',
        ];
    }

    public function messages()
    {
        return [
            'rol.required' => 'El rol es necesario',
            'rol.exists' => 'El rol declarado no es valido',
        ];
    }
}
