<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Infraestructura_cfe;

class InformacionPostesController extends Controller
{
    public function index()
    {
        $id_cliente = 1; // Cambia esto según tu lógica para obtener o definir el id_cliente
        return view('InformacionPostes.infraestructura_cfe', compact('id_cliente'));
    }
    
    public function guardarInfraestructuraCfe(Request $request)
    {
        $request->validate([
            'no_poste' => 'required|array',
            'no_poste.*' => 'required|int',
            'descripcion' => 'required|array',
            'descripcion.*' => 'required|string',
            'latitud' => 'required|array',
            'latitud.*' => 'required|numeric',
            'longitud' => 'required|array',
            'longitud.*' => 'required|numeric',
            'distancia_interpostal' => 'required|array',
            'distancia_interpostal.*' => 'required|numeric',
            'tipo_de_fibra' => 'required|array',
            'tipo_de_fibra.*' => 'required|string',
            'reserva' => 'required|array',
            'reserva.*' => 'required|string',            
            'metros' => 'required|array',
            'metros.*' => 'required|numeric',
            'id_cliente' => 'required|int',
        ]);
    
        $id_cliente = $request->id_cliente;
    
        if ($request->no_poste) {
            foreach ($request->no_poste as $key => $no_poste) {
                $registroPoste = new Infraestructura_cfe();
                $registroPoste->id_cliente = $id_cliente;
                $registroPoste->no_poste = $no_poste;
                $registroPoste->descripcion = $request->descripcion[$key];
                $registroPoste->latitud = $request->latitud[$key];
                $registroPoste->longitud = $request->longitud[$key];
                $registroPoste->distancia_interpostal = $request->distancia_interpostal[$key];
                $registroPoste->tipo_fibra = $request->tipo_de_fibra[$key];
                $registroPoste->reserva_raqueta = $request->reserva[$key];
                $registroPoste->metros = $request->metros[$key];
                $registroPoste->save();
            }
        }
        return redirect()->route('informacion_postes_equipo', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }
    
}

