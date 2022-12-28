<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins =  Admin::latest()->paginate(20);

        return view('admin.pages.admin.index', [
            'admins' => $admins
        ]);
    }

    public function create()
    {
        $administradores = Admin::where('active', true)->get();
        $setores = Setor::where('ativo', true)->get();
        $modules = $setores;

        return view('admin.pages.admin.create', [
            'administradores' => $administradores,
            'setores' => $setores,
            'modules' => $modules
        ]);
    }
}
