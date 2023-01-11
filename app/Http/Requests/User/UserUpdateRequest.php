<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'setor' =>  'required|numeric',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Dever conter no minimo 3 caracteres',
            'email' => 'Deve ser um e-mail válido',
            'unique:users' => 'Este e-mail já está sendo utilizado!',
        ];
    }
}
