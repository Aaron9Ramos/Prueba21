<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Administradores';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Agregar Administrador';
        return view('admin.admin.add', $data);
    }
}
