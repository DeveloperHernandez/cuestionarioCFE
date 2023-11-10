<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchivoAdjunto;



class PlanoController extends Controller
{
    public function indexPlano($id_cliente)
    {
        return view('plano',compact('id_cliente'));
    }

    
public function marcarEnviado($id_cliente, $seccion)
{
$archivo = ArchivoAdjunto::where('id_cliente', $id_cliente)->first();

if (!$archivo) {
// Manejar el caso en que no se encuentra el archivo en la base de datos
return redirect()->back()->with('error', 'Archivo no encontrado.');
}

// Actualizar la columna correspondiente según la sección
$columna = ($seccion == 8) ? 'plano_adjunto' : 'ficha_tecnica_adjunto';
$archivo->$columna = true;
$archivo->save();

return redirect()->back()->with('success', 'Archivo marcado como enviado.');
}
    
}