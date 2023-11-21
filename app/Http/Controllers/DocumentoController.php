<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class DocumentoController extends Controller
{
    public function exportarUsuario($id_usuario)
{
    $usuario = Usuario::findOrFail($id_usuario); // Obtén el usuario por su ID
    $clientes = Cliente::all(); // Obtén todos los clientes
    
    // Combina los usuarios y clientes en un solo array
    $data = [
        'usuarios' => [$usuario],
        'clientes' => $clientes,
    ];
    
    // Crear un objeto de exportación pasando un array con usuarios y clientes
    $export = new UsuariosExport($data);

    // Generar y descargar el archivo Excel
    return Excel::download($export, 'usuario_cliente.xlsx');
}

    
}