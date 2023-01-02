<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\Departamento;
use App\Models\Setor;
use App\Models\TipoTarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChecklistController extends Controller
{
    public function index()
    {
        $setor = Auth::user()->setor;
        $checklists = Checklist::where('setor', $setor)->latest('id')->paginate(20);

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
        $request['user'] = Auth::user()->id;
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        
        $validator = Validator::make($request->all(), [
            'setor' => 'required',
            'tipo_tarefas' => 'required',
            'user' => 'required',
            'nome' => 'required|string|min:3',
            'ativo' => 'required'
        ]);
        
        if ($validator->passes()) {
            
            Checklist::create($request->all());

            return redirect()->route('manager.checklist.index');
        } else {
            return redirect()->back()->withInput($request->only('checklist'))->with('error', 'Existe campos vazio!');
        }
    }

    public function edit($id)
    {
        $checklist = Checklist::find($id);
        $setores = Setor::where('ativo', true)->get();
        $tipo_tarefas = TipoTarefa::where('ativo', true)->get();

        return view('manager.pages.checklist.edit', [
            'checklist' => $checklist,
            'setores' => $setores,
            'tipo_tarefas' => $tipo_tarefas
        ]);
    }

    public function update(Request $request, $id)
    {
        $checklist = Checklist::find($id);
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        $validator = Validator::make($request->all(), [
            'setor' => 'required',
            'tipo_tarefas' => 'required',
            'nome' => 'required|string|min:3',
            'ativo' => 'required'
        ]);
        
        if ($validator->passes()) {

            $checklist->update($request->all());
            
            return redirect()->route('manager.checklist.index');
        } else {
            return redirect()->back()->withInput($request->only('checklist'))->with('error', 'Existe campos vazio!');
        }
    }
}
