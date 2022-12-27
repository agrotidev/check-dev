<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTarefas;
use App\Models\Checklist;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TesteAgrupamentoController extends Controller
{
    public function index()
    {
        $checklist = Checklist::with(['tarefas'])->where('id', 1)->get()[0];
        $categoria_tarefas = Tarefa::where('ativo', true)->where('checklist', $checklist->id)->get()->groupBy('categoria_tarefa');
        // dd($categoria_tarefas);




        return view('manager.pages.teste.index', [
            'checklists' => $checklist,
            'categoriaTarefa' => $categoria_tarefas
        ]);
    }
}
