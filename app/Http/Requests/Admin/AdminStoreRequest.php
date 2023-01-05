<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|numeric',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Deve conter no minimo 3 caracteres',
            'unique:admins' => 'Este e-mail já está sendo utilizado!',
        ];
    }
}
