<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\Setor;
use App\Models\TipoTarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        dd($request->all());

        
        $validator = Validator::make($request->all(), [
            'setor' => 'required',
            'tipo_tarefa' => 'required',
            'user' => 'required',
            'nome' => 'required|string|min:3',
            'descricao' => 'required|string|min:3',
            'ativo' => 'required'
        ]);
        
        if ($validator->passes()) {
            
            $this->repository->create($request->all());

            return redirect()->route('admin.setor.index');
        } else {
            return redirect()->back()->withInput($request->only('setor'))->with('error', 'Existe campos vazio!');
        }
    }
}
