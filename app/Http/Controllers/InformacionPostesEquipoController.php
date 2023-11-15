<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Infraestructura_cfe_equipo;

class InformacionPostesEquipoController extends Controller
{
    public function index()
    {
        $id_cliente = 1; // Cambia esto según tu lógica para obtener o definir el id_clientev
        return view('InformacionPostes.infraestructura_cfe_equipo',compact('id_cliente'));
    }

    public function guardarInfraestructuraCfeEquipo(Request $request)
    {
        $request->validate([
            'no_poste.*' => 'required|int',
            'accesorio.*' => 'required|string',
            'latitud.*' => 'required|numeric',
            'longitud.*' => 'required|numeric',
            'id_cliente' => 'required|int',
        ]);
        
    
        $id_cliente = $request->id_cliente;
        if ($request->no_poste) {
            foreach ($request->no_poste as $key => $no_poste) {
                $registroPoste = new Infraestructura_cfe_equipo();
                $registroPoste->id_cliente = $id_cliente;
                $registroPoste->no_poste = $no_poste;
                $registroPoste->accesorio = $request->accesorio[$key];
                $registroPoste->latitud = $request->latitud[$key];
                $registroPoste->longitud = $request->longitud[$key];
                $registroPoste->save();
            }
        }
        return redirect()->route('lineaTroncal', ['id_cliente' => $id_cliente])->with('success', 'Información guardada exitosamente.');
    }

}
