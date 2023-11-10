<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geoestadistica;
use App\Models\Cliente;

class GeoestadisticaController extends Controller
{
    public function guardarGeoestadisticas(Request $request)
    {
        $request->validate([
            'localidad' => 'required|array',
            'localidad.*' => 'required|string',
            'municipio' => 'required|array',
            'municipio.*' => 'required|string',
            'estado' => 'required|array',
            'estado.*' => 'required|string',
            'uso_posteria' => 'required|string',
        ]);

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
        return redirect()->route('formRuta', ['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');

    }
}