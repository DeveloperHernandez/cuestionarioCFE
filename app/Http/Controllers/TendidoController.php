<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tendido;
use Illuminate\Support\Facades\Session;



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
            'flejes' => 'required|string|max:255',
            'hebillas' => 'required|string|max:255',
            'herraje_j' => 'required|string|max:255',
            'herraje_d' => 'required|string|max:255',
            'tensor' => 'required|string|max:255',
            'fibra_optica' => 'required|string|max:255',
            'caja_distribucion' => 'required|string|max:255',
            'caja_empalme' => 'required|string|max:255',
            'raquetas' => 'required|string|max:255',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de caracteres.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
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
        Session::flash('success', 'La información guardada exitosamente.');
        return redirect()->route('lineaTroncal', ['id_cliente' => $clienteId])->with('success', 'Información guardada exitosamente.');
    }
    
}