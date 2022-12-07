<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetorController extends Controller
{
    private $repository;

    public function __construct(Setor $setor)
    {
        $this->repository = $setor;
    }

    public function index()
    {
        $setores = Setor::with(['departamento'])->latest()->paginate(20);

        return view('admin.pages.setor.index', [
            'setores' => $setores
        ]);
    }

    public function create()
    {
        $departamentos = Departamento::where('ativo', true)->get();

        return view('admin.pages.setor.create', ['departamentos' => $departamentos]);
    }

    public function store(Request $request)
    {
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        
        $validator = Validator::make($request->all(), [
            'cod_setor' => 'required|numeric',
            'departamento' => 'required|numeric',
            'nome' => 'required|string|min:3'
        ]);
        
        if ($validator->passes()) {
            
            $this->repository->create($request->all());

            return redirect()->route('admin.setor.index');
        } else {
            return redirect()->back()->withInput($request->only('setor'))->with('error', 'Existe campos vazio!');
        }
    }

    public function destroy($id)
    {
        $setor = $this->repository->where('id', $id)->first();
    }

    public function edit($id)
    {
        $setor = Setor::with('departamento')->find($id);
        $departamentos = Departamento::where('ativo', true)->get();

        return view('admin.pages.setor.edit', [
            'setor' => $setor,
            'departamentos' => $departamentos
        ]);
    }

    public function update(Request $request, $id)
    {
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        dd($request->all());
    }
}
