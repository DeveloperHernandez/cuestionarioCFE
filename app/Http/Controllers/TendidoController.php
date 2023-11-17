<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tendido;

class TendidoController extends Controller
{
    public function indexTendido()
    {
        $id_cliente = 1; 
        return view('InformacionPostes.tendido',compact('id_cliente'));
    }

    public function guardarTendido(Request $p)
    {
        $p->validate([
            'flejes' => 'required',
            'hebillas' => 'required',
            'herraje_j' => 'required',
            'herraje_d' => 'required',
            'tensor' => 'required',
            'fibra_optica' => 'required',
            'caja_distribucion'=> 'required',
            'caja_empalme' => 'required',
            'raquetas' => 'required'
        ]);

        $clienteId = $p->input('id_cliente');        
        
        $flejes = $p->flejes;
        $hebillas = $p->hebillas;
        $herraje_j = $p->herraje_j;
        $herraje_d = $p->herraje_d;
        $tensor = $p->tensor;
        $fibra_optica = $p->nombre_lugar;
        $caja_distribucion =$p->caja_distribucion;
        $caja_empalme = $p->caja_empalme;
        $raquetas = $p->raquetas;
        
        Tendido::create([
            'flejes_descripcion' => $flejes,
            'hebillas_descripcion' => $hebillas,
            'herraje_tipoJ_descripcion' => $herraje_j,
            'herraje_tipoD_descripcion' => $herraje_d,
            'tensor_descripcion' => $tensor,
            'fibraOptica_descripcion' => $fibra_optica,
            'cajas_distribucion'=>$caja_distribucion,
            'cajas_empalme'=> $caja_empalme,
            'raquetas_descripcion'=> $raquetas,
            'id_cliente' => $clienteId,
        ]);
    
        return redirect()->route('lineaTroncal', ['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }
    
}