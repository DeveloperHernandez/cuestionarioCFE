<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class DescargaController extends Controller
{
    public function verClientesDocumento()
    {
        $usuarios = Usuario::where('estado', 'activo')->get();
        return view('documento', ['usuarios' => $usuarios]);
    }
}