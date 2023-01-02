<?php

namespace App\Http\Requests\ChecklistGrupo;

use Illuminate\Foundation\Http\FormRequest;

class ChecklistGrupoStoreRequest extends FormRequest
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
            'nome' => 'required|string|min:3|unique:checklist_grupos',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'unique' => 'Este nome de grupo já existe no sistema'
        ];
    }
}
