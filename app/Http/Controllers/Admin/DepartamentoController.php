<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departamento;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr as Toast;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    private $repository;
    private $toast;

    public function __construct(Departamento $departamento)
    {
        $this->repository = $departamento;
    }

    public function index()
    {
        $departamentos = $this->repository->latest()->paginate(20);

        return view('admin.pages.departamento.index', [
            'departamentos' => $departamentos
        ]);
    }

    public function create()
    {
        return view('admin.pages.departamento.create');
    }

    public function store(Request $request)
    {

        if (Departamento::where('cod_departamento',$request->cod_departamento)->exists()) {
            return redirect()->back()->withInputs($request->only('departamento'))->with('error', 'Já existe departamento com esse código!');
        }

        $request['ativo']  = (!isset($request['ativo']))? false : true;


        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:3',
            'cod_departamento' => 'required|numeric'
        ]);

        if ($validator->passes()) {

            $this->repository->create($request->all());

            Toast::success('Criado com sucesso!');

            return redirect(route('admin.departamento.index'));;
        } else {
            return redirect()->back()->withInputs($request->only('departamento'))->with('error', 'Existe campos vazio!');
        }

    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);

        return view('admin.pages.departamento.edit', [
            'departamento' => $departamento
        ]);
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::where('id', $id)->first();
        
        $request['ativo']  = (!isset($request['ativo']))? false : true;

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:3',
            'ativo' => 'required'
        ]);

        if ($validator->passes()) {

            $departamento->update($request->all());

            Toast::success('Atualizado com sucesso!');

            return redirect(route('admin.departamento.index'));
        } else {
            return redirect()->back()->withInputs($request->only('departamento'))->with('error', 'Existe campos vazio!');
        }
    }

    public function destroy($id)
    {
        $departamento = $this->repository->where('id', $id)->first();

    }
}
