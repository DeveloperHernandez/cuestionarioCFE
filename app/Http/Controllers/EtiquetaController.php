<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        $id_cliente = 1;
        return view('InformacionPostes.etiqueta',compact('id_cliente'));
    }

    public function guardarEtiqueta()
    {

    }

}