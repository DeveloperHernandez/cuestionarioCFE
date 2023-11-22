<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enviado;



class PlanoController extends Controller
{
    public function indexPlano($id_cliente)
    {
        return view('plano',compact('id_cliente'));
    }

    //del botón siguiente de rua nos pasamos a plano, necesito el id_cliente actual
    public function planoSiguiente()
    {
        $id_cliente = 1;
        return view('plano',compact('id_cliente'));
    }

    
    
}