<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaDistribucion;

class lineaDistribucionController extends Controller
{
    public function index()
    {
        $id_cliente = 1; 
        return view('InformacionPostes.linea_distribucion',compact('id_cliente'));
    }

    public function guardarLineaDistribucion(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'piezas' => 'required|int',
            'peso_por_pieza' => 'required|numeric',
            'id_cliente' => 'required|int',
        ]);

        $id_cliente = $request->id_cliente;

        $elemento = new LineaDistribucion();
        $elemento->nombre = $request->nombre;
        $elemento->piezas = $request->piezas;
        $elemento->peso_por_pieza = $request->peso_por_pieza;
        $elemento->id_cliente = $request->id_cliente;

        $elemento->save();

        return redirect()->route('accesorios', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }
}