<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::latest()->paginate(20);
        dd($checklists);

        return view('admin.pages.departamento.index', [
            'departamentos' => $checklists
        ]);
    }
}
