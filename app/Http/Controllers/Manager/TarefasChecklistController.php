<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CategoriaTarefas;
use App\Models\Checklist;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarefasChecklistController extends Controller
{
    public function index($checklist)
    {
        $checklist = Checklist::with(['tarefas'])->where('id', $checklist)->get()[0];
        // $tarefas = $checklist->tarefas;
        
        return view('manager.pages.tarefas-checklist.index', [
            'checklist' => $checklist
        ]);
    }

    public function create($checklist)
    {
        $checklist = Checklist::with(['tarefas'])->where('id', $checklist)->get()[0];
        $categoria_tarefas = CategoriaTarefas::where('ativo', true)->where('id', '<>', 1)->get();

        
        return view('manager.pages.tarefas-checklist.create', [
            'checklist' => $checklist,
            'categoria_tarefas' => $categoria_tarefas
        ]);
    }

    public function store(Request $request, $checklist)
    {
        $checklist = Checklist::where('id', $checklist)->get()[0];

        // Verifica o tipo de tarafas e já atribui caso seja 1 Padrão
        // $request['categoria_tarefa'] = (isset($request['categoria_tarefa'])) ? 1 : $request['categoria_tarefa'];

        // Verifica o tipo de tarafas e já atribui caso seja 1 Padrão
        if ($checklist->tipo_tarefas != 3) {
            $request['categoria_tarefa'] = 1;
        }

        $request['checklist'] =  $checklist->id;
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        $validator = Validator::make($request->all(), [
            'checklist' => 'required|numeric',
            'categoria_tarefa' => 'required|numeric',
            'nome' => 'required|string|min:3',
            'ativo' => 'required',
        ]);

        if ($validator->passes()) {
            Tarefa::create($request->all());

            return redirect()->route('manager.checklist.tarefas.index', $checklist->id);
        } else {
            return redirect()->back()->withInput($request->only('tarefas'))->with('error', 'Existe campos vazio!');
        }
    }
}
