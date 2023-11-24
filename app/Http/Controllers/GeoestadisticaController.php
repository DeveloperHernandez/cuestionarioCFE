<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geoestadistica;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Support\Facades\Session;


class GeoestadisticaController extends Controller
{
    //este es del botón siguiente, contioene todos los datos a pasar para la vista geoestadistica
    public function indexGeoestadistica(){
        $estados = Estado::all(); 
        $municipios = Municipio::all();
        $ver = session('user');
        if ($ver) {
            return view('geoestadisticas', compact('municipios', 'estados', 'ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }

    public function guardarGeoestadisticas(Request $request)
    {
        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'array' => 'El campo :attribute debe ser un arreglo.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
        ];
    
        $request->validate([
            'localidad' => 'required|array',
            'localidad.*' => 'required|string',
            'municipio' => 'required|array',
            'municipio.*' => 'required|string',
            'estado' => 'required|array',
            'estado.*' => 'required|string',
            'uso_posteria' => 'required|string',
        ], $mensajes);

        $clienteId = $request->input('id_cliente');
        $cliente = Cliente::find($clienteId);

        if ($request->localidad) {
            foreach ($request->localidad as $key => $localidad) {
                $registroGeoestadistico = new Geoestadistica();
                $registroGeoestadistico->nombre_localidad = $localidad; // Aquí usa el nombre de columna correcto
                $registroGeoestadistico->id_municipio = $request->municipio[$key];
                $registroGeoestadistico->id_estado = $request->estado[$key];
                $registroGeoestadistico->uso_posteria_solicitada = $request->uso_posteria;

                $cliente->geoestadisticos()->save($registroGeoestadistico);
            }
        }
        Session::flash('success', 'La información guardada exitosamente.');
        return redirect()->route('formRuta', ['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }
}
