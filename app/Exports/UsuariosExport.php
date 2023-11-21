<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\PersonaAutorizada;
use App\Models\areaGeoestadistica;
use App\Models\Tendido;
use App\Models\LineaTroncal;
use App\Models\LineaDistribucion;
use App\Models\Accesorio;
use App\Models\Infraestructura_cfe;
use App\Models\Infraestructura_cfe_equipo;
use App\Models\Cronograma;
use App\Models\Ruta;
use App\Models\Enviado;



class UsuariosExport implements FromCollection,WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        
        return [
            'id_usuario',
            'nombre_usuario',
            'apellido_paterno',
            'apellido_materno',
            'telefono',
            'correo_electronico',
            'contrasenia',
            'rol',
            'estado',
            'id_cliente',
            'id_personaAutorizada',
            'nombre_cliente',
            'domicilio',
            'correo_electronico',
        ];

    }

    public function collection()
    {
        // Combina las colecciones de usuarios y clientes en una sola
        $usuarios = collect($this->data['usuarios']);
        $clientes = collect($this->data['clientes']);

        // Asegúrate de ajustar las claves según la estructura de tus tablas
        $mergedCollection = $usuarios->merge($clientes);

        return $mergedCollection;
    }
}
