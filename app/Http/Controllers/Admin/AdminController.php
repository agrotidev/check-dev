<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
}
