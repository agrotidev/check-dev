<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\Setor;
use App\Models\TipoTarefa;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::latest()->paginate(20);

        return view('manager.pages.checklist.index', [
            'checklists' => $checklists
        ]);
    }

    public function create()
    {
        $setores = Setor::class::where('ativo', true)->get();
        $tipo_tarefas = TipoTarefa::where('ativo', true)->get();

        return view('manager.pages.checklist.create', [
            'setores' => $setores,
            'tipo_tarefas' => $tipo_tarefas,
        ]);
    }
}
