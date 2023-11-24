<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    public function index()
    {
        $ver = session('user');
        if ($ver) {
            return view('InformacionPostes.etiqueta',compact('ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }

    public function guardarEtiqueta(Request $p)
    {
        $clienteId = $p->input('id_cliente');   
        $etiqueta_adjunto = $p->has('boton3');  // Verifica si el botón "boton2" está presente
        
        Etiqueta::create([
            'etiqueta_adjunto' => $etiqueta_adjunto,
            'id_cliente' => $clienteId,
        ]);
        return redirect()->route('etiqueta', ['id_cliente' => $clienteId]);
    }

}