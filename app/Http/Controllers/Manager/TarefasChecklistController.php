<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CategoriaTarefas;
use App\Models\Checklist;
use Illuminate\Http\Request;

class TarefasChecklistController extends Controller
{
    public function index($id)
    {
        $checklist = Checklist::with(['tarefas'])->where('id', $id)->get()[0];
        // $tarefas = $checklist->tarefas;
        
        return view('manager.pages.tarefas-checklist.index', [
            'checklist' => $checklist
        ]);
    }

    public function create($checklist)
    {
        $checklist = Checklist::with(['tarefas'])->where('id', $checklist)->get()[0];
        $categoria_tarefas = CategoriaTarefas::where('ativo', true)->get();
        
        return view('manager.pages.tarefas-checklist.create', [
            'checklist' => $checklist,
            'categoria_tarefas' => $categoria_tarefas
        ]);
    }
}
