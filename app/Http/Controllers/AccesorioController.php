<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accesorio;
use Illuminate\Support\Facades\Session; 


class AccesorioController extends Controller
{
    public function index()
    {
        $ver = session('user');
        if ($ver) {
            return view('InformacionPostes.accesorios', compact('ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }

    public function guardarAccesorio(Request $request)
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
            'peso_por_pieza' => 'required|numeric|gt:0',
            'id_cliente' => 'required|int',
        ], $mensajes);
        
        $id_cliente = $request->id_cliente;
        
        $elemento = new Accesorio();
        $elemento->nombre = $request->nombre;
        $elemento->peso_por_pieza = $request->peso_por_pieza;
        $elemento->id_cliente = $request->id_cliente;
        $elemento->save();


        Session::flash('success', 'La información guardada exitosamente.');
        return redirect()->route('cronograma', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }

}