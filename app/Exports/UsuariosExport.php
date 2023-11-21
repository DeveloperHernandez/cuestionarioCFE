<?php
namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsuariosExport implements WithMultipleSheets
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        // Agrega la hoja de usuarios
        $sheets[] = new UsuariosSheet($this->data['usuarios']);

        // Agrega la hoja de clientes
        $sheets[] = new ClientesSheet($this->data['clientes']);

        return $sheets;
    }
}

class UsuariosSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $usuarios;

    public function __construct($usuarios)
    {
        $this->usuarios = $usuarios;
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
        ];
    }

    public function collection()
    {
        return collect($this->usuarios);
    }
}

class ClientesSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $clientes;

    public function __construct($clientes)
    {
        $this->clientes = $clientes;
    }

    public function headings(): array
    {
        return [
            'id_cliente',
            'id_personaAutorizada',
            'nombre_cliente',
            'domicilio',
            'correo_electronico',
        ];
    }

    public function collection()
    {
        return collect($this->clientes);
    }
}