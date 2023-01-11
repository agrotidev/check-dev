<?php

namespace App\Http\Controllers\Api\Off;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Models\CategoriaTarefas;
use App\Models\Departamento;
use App\Models\Setor;
use App\Models\Tarefa;
use App\Models\TipoTarefa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->all(['email', 'password']);

        Validator::make($credenciais, [
            'email' => 'required|string',
            'password' => 'required|string'
        ])->validate();

        $user = User::where('email', $request->email)->where('active', true)->first();


        if (!$user) {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 401);
        }

        if ($user->mobile == false) {
            $message = new ApiMessage('Usuário Inativo, Procurar o setor de TI');
            return response()->json($message->getMessage(), 401);
        }

        if (!(Hash::check($credenciais['password'], $user->password_mobile))) {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 200);            
         }

        // Verifico todos os checklists do usuario pelo o grupo que ele pertence
        // e faço flattern para criar a nova coleção listando os checklist
        // de forma distintas
        $checklistsIds = $user->grupos->map(function($grupo){
            return $grupo->checklists;
        });
        $checklists = $checklistsIds->flatten()->unique('id');

        // Genreate token
        $token = bcrypt($user->code.'.'.$user->email.'.'.$user->password_mobile);

        $user = [
            'user' => $user->id,
            'setor' => $user->setor,
            'code' => $user->code,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile
        ];

        // ALL DATA IMPORT
        $usuarios = User::where('code', $user['code'])->get()->makeVisible(['code', 'nome', 'email', 'password_mobile'])->makeHidden(['active', 'web']);
        $departamentos = Departamento::where('ativo', true)->get();
        $setores = Setor::where('ativo', true)->get();
        $tarefas = Tarefa::where('ativo', true)->get();
        $categoria_tarefas = CategoriaTarefas::where('ativo', true)->get();
        $tipo_tarefas = TipoTarefa::where('ativo', true)->get();
        


        return response()->json([
            'data' => [
                'token' => $token,
                'user_login' => $user,
                'usuarios' => $usuarios,
                'departamentos' => $departamentos,
                'setores' => $setores,
                'categoria_tarefas' => $categoria_tarefas,
                'tipo_tarefas' => $tipo_tarefas,
                'tarefas' => $tarefas,
                'checklists' => $checklists
            ]
        ], 200);
    
    }

}
