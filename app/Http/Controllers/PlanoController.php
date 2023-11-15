<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchivoAdjunto;



class PlanoController extends Controller
{
    public function indexPlano($id_cliente)
    {
        return view('plano',compact('id_cliente'));
    }
    public function marcarEnviado($id_cliente, $seccion)
    {
      
    }
    
}