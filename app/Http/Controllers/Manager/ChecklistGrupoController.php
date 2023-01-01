<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ChecklistGrupo;
use Illuminate\Http\Request;

class ChecklistGrupoController extends Controller
{
    public function index()
    {
        $checklistGrupos = ChecklistGrupo::where('ativo', true)->latest('id')->paginate(20);

        return view('manager.pages.checklist.index', [
            'checklistGrupos' => $checklistGrupos
        ]);
    }
}
