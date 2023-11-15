<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enviado;

class EnviadoController extends Controller
{
    public function guardarPlano(Request $p)
    {
        $clienteId = $p->input('id_cliente');   
        $plano_adjunto = $p->has('boton1');  // Verifica si el botón "boton1" está presente
        
        Enviado::create([
            'plano_adjunto' => $plano_adjunto,
            'id_cliente' => $clienteId,
        ]);

        return redirect()->route('formPlano',['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }

    public function guardarFicha(Request $p)
    {
        $clienteId = $p->input('id_cliente');   
        $ficha_adjunto = $p->has('boton2');  // Verifica si el botón "boton2" está presente
        
        Enviado::create([
            'ficha_tecnica_adjunto' => $ficha_adjunto,
            'id_cliente' => $clienteId,
        ]);

        return redirect()->route('formPlano',['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }
}

