<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
