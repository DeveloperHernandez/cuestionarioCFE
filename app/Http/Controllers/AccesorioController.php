<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accesorio;


class AccesorioController extends Controller
{
    public function index()
    {
        $id_cliente = 1; //creo que este se puede recibir en el parametro
        return view('InformacionPostes.accesorios', compact('id_cliente'));
    }

    public function guardarAccesorio(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'peso_por_pieza' => 'required|numeric',
            'id_cliente' => 'required|int',
        ]);
        $id_cliente = $request->id_cliente;
        
        $elemento = new Accesorio();
        $elemento->nombre = $request->nombre;
        $elemento->peso_por_pieza = $request->peso_por_pieza;
        $elemento->id_cliente = $request->id_cliente;
        $elemento->save();

        return redirect()->route('cronograma', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }

}