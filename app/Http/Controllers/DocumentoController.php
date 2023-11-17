<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class DocumentoController extends Controller
{
    public function exportarUsuario($id_usuario)
    {
        $usuario = Usuario::findOrFail($id_usuario); // Obtén el usuario por su ID
    
        // Crear un objeto de exportación pasando un array con un solo usuario
        $export = new UsuariosExport([$usuario]);
    
        // Generar y descargar el archivo Excel
        return Excel::download($export, 'usuario.xlsx');
    }
    
}



