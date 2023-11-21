<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cronograma;
use Illuminate\Support\Facades\Session; 


class CronogramaController extends Controller
{
    public function index()
    {
        $id_cliente = 1;
        return view('InformacionPostes.cronograma',compact('id_cliente'));
    }

    public function guardarCronograma(Request $request)
    {
        $request->validate([
            'proceso_construccion.*' => 'required|string',
            'descripcion.*' => 'required|string',
            'fecha.*' => 'required|date',
        ]);
    
        $id_cliente = $request->id_cliente;
        if ($request->proceso_construccion) {
            foreach ($request->proceso_construccion as $key => $proceso_construccion) {
                $registroCronograma = new Cronograma();
                $registroCronograma->id_cliente = $id_cliente;
                $registroCronograma->proceso_construccion = $proceso_construccion;
                $registroCronograma->descripcion = $request->descripcion[$key];
                $registroCronograma->fechas_realizar = $request->fecha[$key];
                $registroCronograma->save();
            }
        }

        Session::flash('success', 'La información guardada exitosamente.');
        return redirect()->route('etiqueta', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }
    
}
