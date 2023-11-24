<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enviado;



class PlanoController extends Controller
{
    public function indexPlano()
    {
        $ver = session('user');
        if ($ver) {
            return view('plano',compact('ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }

    //del botón siguiente de rua nos pasamos a plano, necesito el id_cliente actual
    public function planoSiguiente()
    {
        $ver = session('user');
        if ($ver) {
            return view('plano',compact('ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }

    
    
}