<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'setor' =>  'required|numeric',
            'code' => 'required|numeric',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Dever conter no minimo 3 caracteres',
            'email' => 'Este e-mail já está sendo utilizado!',
        ];
    }
}
