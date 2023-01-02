<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGrupo\ChecklistGrupoStoreRequest;
use App\Models\ChecklistGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr as Toast;

class ChecklistGrupoController extends Controller
{
    public function index()
    {
        $checklistGrupos = ChecklistGrupo::where('ativo', true)->latest('id')->paginate(20);

        return view('manager.pages.checklist-grupo.index', [
            'checklistGrupos' => $checklistGrupos
        ]);
    }

    public function create()
    {
        return view('manager.pages.checklist-grupo.create');
    }

    public function store(ChecklistGrupoStoreRequest $request)
    {
        $request['user'] = Auth::user()->id;
        $request['modulo'] = Auth::user()->modulo;
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        try {          

            if (!ChecklistGrupo::create($request->all())) {
                Toast::success('Ocorreu um erro ao cadastrar!');
                return redirect()->back();
            }

            Toast::success('Criado com sucesso!');
            return redirect()->route('manager.checklist.grupo.index');
        } catch (\Exception $e) {
            Toast::success('Erro ao cadastrar!');
        }
    }
}
