<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Cliente;

class RutaController extends Controller
{
    public function indexRuta($id_cliente)
    {
        return view('ruta',compact('id_cliente'));
    }

    // del boton siguiente de geostadistica pasamos a ruta, necesito el id_cliente actual
    public function rutaSiguiente()
    {
        $id_cliente=1;
        return view('ruta',compact('id_cliente'));
    }


    public function guardar(Request $p)
    {
        $p->validate([
            'colonia' => 'required',
            'localidad' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required',
            'nombre_lugar' => 'required',
            'infraestructura_cfe_tercero'=> 'required',
            'inicio' => 'required',
            'final' => 'required',
            'numero_postes'=> 'required',
            'totalkm_cable'=> 'required'
        ]);

        $clienteId = $p->input('id_cliente');        
        
        $colonia = $p->colonia;
        $localidad = $p->localidad;
        $municipio = $p->municipio;
        $estado = $p->estado;
        $codigo_postal = $p->codigo_postal;
        $nombre_lugar_completo = $p->nombre_lugar;
        $infraestructura_cfe_tercero =$p->infraestructura_cfe_tercero;
        $inicio = $p->inicio;
        $final = $p->final;
        $numero_postes = $p->numero_postes;
        $totalkm_cable = $p->totalkm_cable;

        
        Ruta::create([
            'colonia' => $colonia,
            'localidad' => $localidad,
            'municipio' => $municipio,
            'estado' => $estado,
            'codigo_postal' => $codigo_postal,
            'nombre_lugar_completo' => $nombre_lugar_completo,
            'infraestructura_cfe_tercero'=>$infraestructura_cfe_tercero,
            'inicio_ruta'=> $inicio,
            'final_ruta'=> $final,
            'numero_postes'=> $numero_postes,
            'totalkm_cable'=> $totalkm_cable,
            'id_cliente' => $clienteId,
        ]);
    
        return redirect()->route('formPlano',['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }
    
}