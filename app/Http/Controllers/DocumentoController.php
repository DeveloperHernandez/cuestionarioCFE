<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Geoestadistica;
use App\Models\Ruta;
use App\Models\Enviado;
use App\Models\Infraestructura_cfe;
use App\Models\Infraestructura_cfe_equipo;
use App\Models\Tendido;
use App\Models\LineaTroncal;
use App\Models\LineaDistribucion;
use App\Models\Accesorio;
use App\Models\Cronograma;
use App\Models\Etiqueta;

use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class DocumentoController extends Controller
{
    public function exportarUsuario($id_usuario)
{
    $usuario = Usuario::findOrFail($id_usuario); // Obtén el usuario por su ID
    $cliente = Cliente::findOrFail($id_usuario); 
    $geoestadistica = Geoestadistica::findOrFail($id_usuario); 
    $ruta = Ruta::findOrFail($id_usuario); 
    $enviado = Enviado::findOrFail($id_usuario); 
    $infraestructuraCFE = Infraestructura_cfe::findOrFail($id_usuario); 
    $infraestructuraEquipo = Infraestructura_cfe_equipo::findOrFail($id_usuario); 
    $infraestructuraEquipo = Infraestructura_cfe_equipo::findOrFail($id_usuario); 
    $tendido = Tendido::findOrFail($id_usuario); 
    $linea_troncal = LineaTroncal::findOrFail($id_usuario); 
    $linea_distribucion = LineaDistribucion::findOrFail($id_usuario); 
    $accesorio = Accesorio::findOrFail($id_usuario); 
    $cronograma = Cronograma::findOrFail($id_usuario); 
    $etiqueta = Etiqueta::findOrFail($id_usuario); 


    // Combina los usuarios y clientes en un solo array
    $data = [
        'usuarios' => [$usuario],
        'clientes' => [$cliente],
        'geoestadisticas' => [$geoestadistica],
        'rutas' => [$ruta],
        'enviados' => [$enviado],
        'infraestructuras' => [$infraestructuraCFE],
        'infraestructurasEquipos' => [$infraestructuraEquipo],
        'tendidos' => [$tendido],
        'lineaTroncal' => [$linea_troncal],
        'lineaDistribucion' => [$linea_distribucion],
        'accesorios' => [$accesorio],
        'cronograma' => [$cronograma],
        'etiqueta' => [$etiqueta],
    ];
    // Crear un objeto de exportación que incluya múltiples hojas
    $export = new UsuariosExport($data);

    // Generar y descargar el archivo Excel
    return Excel::download($export, 'documento.xlsx');
}

    
}