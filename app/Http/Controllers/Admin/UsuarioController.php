<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::latest()->paginate(20);

        return view('admin.pages.usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        $administradores = User::where('active', true)->get();
        $setores = Setor::where('ativo', true)->get();
        $modules = $setores;

        return view('admin.pages.usuario.create', [
            'usuarios' => $administradores,
            'setores' => $setores,
            'modules' => $modules
        ]);
    }
}
