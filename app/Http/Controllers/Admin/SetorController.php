<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    private $repository;

    public function __construct(Setor $setor)
    {
        $this->repository = $setor;
    }

    public function index()
    {
        $setores = $this->repository->latest()->paginate(20);

        return view('admin.pages.setor.index', [
            'setores' => $setores
        ]);
    }
}
