<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $setores = Setor::with(['departamento'])->paginate(20);

        return view('admin.pages.setor.index', [
            'setores' => $setores
        ]);
    }

    public function create()
    {
        return view('admin.pages.setor.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request['ativo'] = empty($request->ativo) ? false : true;

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
}
