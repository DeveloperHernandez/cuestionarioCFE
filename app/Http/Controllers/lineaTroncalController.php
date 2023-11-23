<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaTroncal;
use Illuminate\Support\Facades\Session;

class lineaTroncalController extends Controller
{
    public function index()
    {
        $id_cliente = 1; //creo que este se puede recibir en el parametro
        return view('InformacionPostes.linea_troncal', compact('id_cliente'));
    }

    public function guardarLineaTroncal(Request $request)
    {
        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'int' => 'El campo :attribute debe ser un número entero.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'gt' => 'El campo :attribute debe ser mayor que cero.',
        ];
    
        $request->validate([
            'nombre' => 'required|string',
            'piezas' => 'required|int|gt:0',
            'peso_por_pieza' => 'required|numeric|gt:0',
            'id_cliente' => 'required|int',
        ], $mensajes);
    
    
        $id_cliente = $request->id_cliente;
        
        $elemento = new LineaTroncal();
        $elemento->nombre = $request->nombre;
        $elemento->piezas = $request->piezas;
        $elemento->peso_por_pieza = $request->peso_por_pieza;
        $elemento->id_cliente = $request->id_cliente;

        $elemento->save();

        Session::flash('success', 'La información guardada exitosamente.');
        return redirect()->route('lineaDistribucion', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
        //return response()->json(['resultados' => $resultados]);
    }

}

