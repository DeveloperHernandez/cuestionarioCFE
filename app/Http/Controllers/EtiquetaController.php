<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    public function index()
    {
        $id_cliente = 1;
        return view('InformacionPostes.etiqueta',compact('id_cliente'));
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