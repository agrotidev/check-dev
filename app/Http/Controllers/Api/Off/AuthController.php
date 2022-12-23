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

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 401);
        }

        if (!($user->password_mobile === md5($credenciais['password'])))
        {
            $message = new ApiMessage('Usuario ou senha invalido');
            return response()->json($message->getMessage(), 401);
        }

        // Genreate token
        $token = base64_encode($user->code.'.'.$user->email);
        
        return response()->json([
            'token' => $token
        ]);
    }

}
