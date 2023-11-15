<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaTroncal;


class lineaTroncalController extends Controller
{
    public function index()
    {
        $id_cliente = 1; //creo que este se puede recibir en el parametro
        return view('InformacionPostes.linea_troncal', compact('id_cliente'));
    }

    public function guardarLineaTroncal(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'piezas' => 'required|int',
            'peso_por_pieza' => 'required|numeric',
            'id_cliente' => 'required|int',
        ]);
        $id_cliente = $request->id_cliente;
        
        $elemento = new LineaTroncal();
        $elemento->nombre = $request->nombre;
        $elemento->piezas = $request->piezas;
        $elemento->peso_por_pieza = $request->peso_por_pieza;
        $elemento->id_cliente = $request->id_cliente;

        $elemento->save();

        return redirect()->route('lineaDistribucion', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }

}