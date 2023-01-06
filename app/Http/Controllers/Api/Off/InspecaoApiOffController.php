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
            // Recupero as tarefas da inspeção
            $tarefasInspencao = $request->tarefas;
            $imagens = $request->file('imagens');
            $imagensUpload = [];
            $tarefas = [];


            // Verifico se existe tarefa da inspeção
            if ($tarefasInspencao) {
                foreach ($tarefasInspencao as $index => $tarefa) {
                    $tarefas[$index] = $tarefa;
                }
            }

            // Faço a desserialização do objeto de tarefas que veio serializado para json novamente
            $tarefas = json_decode($tarefas[0]);
            

            // Verifica se tem imagem
            if ($imagens) {

                // Percorre todo array de imagem para salvar
                foreach ($imagens as $imagem) {
                    $path = $imagem->store('imagens', 'public');
                    $imagensUpload[] = ['imagem' => $path, 'is_thumb' => false];
                }
            }



            // $seria = unserialize($tarefasArray[0]->tarefas);

            return response()->json([
                'data' =>  $request->all(),
                'imagens' => $imagensUpload,
                'tarefas' => $tarefas
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
