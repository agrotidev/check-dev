<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $usuarios = User::all();
        $departamentos = Departamento::all();
        $setores = Setor::all();

        return view('admin.pages.dashboard',[
            'usuarios' => $usuarios,
            'departamentos' => $departamentos,
            'setores' => $setores,
        ]);
    }

    // public function login(Request $request)
    // {
    //     $request['remember'] = empty($request->remember) ? false : true;
    //     $this->validaLogin($request);

    //     $credenciais = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     if (Auth::guard('admin')->attempt($credenciais, $request->remember)) {
    //         return redirect()->intended(route('admin.dashboard'));
    //     }

    //     return redirect()->back()->withInputs($request->only('email', 'remember'));
    // }

    // protected function validaLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required',
    //     ]);
    // }
}
