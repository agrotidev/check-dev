<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
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

        return view('admin.pages.admin.create', [
            'administradores' => $administradores
        ]);
    }

    public function store(AdminStoreRequest $request)
    {
        $request['active']  = (!isset($request['active']))? false : true;

        dd($request->all());
    }
}
