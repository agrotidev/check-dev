<?php

namespace App\Http\Controllers\Api\Off;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspecaoApiOffController extends Controller
{
    public function integraInspecao(Request $request)
    {
        try {
            $imagens = $request->file('imagens');
            $imagensUpload = [];

            // Verifica se tem imagem
            if ($imagens) {

                // Percorre todo array de imagem para salvar
                foreach ($imagens as $imagem) {
                    $path = $imagem->store('imagens', 'public');
                    $imagensUpload[] = ['imagem' => $path, 'is_thumb' => false];
                }
            }

            return response()->json([
                'data' =>  $request->all(),
                'imagens' => $imagensUpload
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
