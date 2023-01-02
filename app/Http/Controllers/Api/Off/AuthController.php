<?php

namespace App\Http\Controllers\Api\Off;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

        $checklist = $user;

        if (!$user) {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 401);
        }

        if ($user->mobile == false) {
            $message = new ApiMessage('Usuário Inativo, Procurar o setor de TI');
            return response()->json($message->getMessage(), 401);
        }

        if (!($user->password_mobile === md5($credenciais['password'])))
        {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 401);
        }

        // Genreate token
        $token = base64_encode($user->code.'.'.$user->email);

        $user = [
            'setor' => $user->setor,
            'code' => $user->code,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile
        ];

        $usuarios = User::all()->makeVisible(['code', 'nome', 'email', 'password_mobile'])->makeHidden(['active', 'web']);

        


        return response()->json([
            'data' => [
                'token' => $token,
                'user_login' => $user,
                'usuarios' => $usuarios,
                'checklist' => $checklist->checklists
            ]
        ], 200);
    
    }

}
