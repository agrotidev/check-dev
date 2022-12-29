<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr as Toast;
use Illuminate\Support\Facades\Validator;

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
        $usuarios = User::where('active', true)->get();
        $setores = Setor::where('ativo', true)->get();
        $modulos = $setores;

        return view('admin.pages.usuario.create', [
            'usuarios' => $usuarios,
            'setores' => $setores,
            'modulos' => $modulos
        ]);
    }

    public function store(Request $request)
    {
        $request['ismanager']  = (!isset($request['ismanager']))? false : true;
        $request['islider']  = (!isset($request['islider']))? false : true;
        $request['mobile']  = (!isset($request['mobile']))? false : true;
        $request['active']  = (!isset($request['active']))? false : true;
        $request['modulo'] = $request->setor;

        $validator = Validator::make($request->all(), [
            'setor' =>  'required|numeric',
            'modulo' => 'required|numeric',
            'code' => 'required|numeric',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
        ]);

        if($validator->fails()){
            // if ($validator->errors['emaiil']) {
            //     Toast::error($validator->errors());
            // }
            dd($validator->errors());
            Toast::error($validator->errors());
        }
     

        if ($validator->passes()) {
            
            dd($request->all());
            
            
            // User::create($request->all());

            Toast::success('Criado com sucesso!');
            return redirect()->route('admin.usuario.index');
        } else {
            Toast::error('Erro');
            return redirect()->back();
            // return redirect()->back()->withInput($request->only('usuarios'))->with('error', 'Existe campos vazio!');
        }
    }
}
