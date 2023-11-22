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

        // Agrega la hoja de usuarios con el nombre 'Usuarios'
        $sheets[] = new UsuariosSheet($this->data['usuarios']);

        // Agrega la hoja de clientes
        $sheets[] = new ClientesSheet($this->data['clientes']);

        // Agrega la hoja de geoestadisticas
        $sheets[] = new GeoestadisticasSheet($this->data['geoestadisticas']);

        // Agrega la hoja de rutas
        $sheets[] = new RutasSheet($this->data['rutas']);
        
        // Agrega la hoja de Enviados
        $sheets[] = new EnviadosSheet($this->data['enviados']);
                
        // Agrega la hoja de infraestructuraCFE
        $sheets[] = new InfraestructurasCFESheet($this->data['infraestructuras']);
        
        // Agrega la hoja de infraestructurasEquipos
        $sheets[] = new InfraestructurasCFEEquipoSheet($this->data['infraestructurasEquipos']);

        // Agrega la hoja de tendidos
        $sheets[] = new TendidosSheet($this->data['tendidos']);
        
        // Agrega la hoja de Troncal
        $sheets[] = new LineaTroncalSheet($this->data['lineaTroncal']);
        
        // Agrega la hoja de Linea de Distribucion
        $sheets[] = new LineaDistribucionSheet($this->data['lineaDistribucion']);

        // Agrega la hoja de Linea de Distribucion
        $sheets[] = new LineaDistribucionSheet($this->data['lineaDistribucion']);

        // Agrega la hoja de accesorio
        $sheets[] = new AccesoriosSheet($this->data['accesorios']);
        
        // Agrega la hoja cronograma
        $sheets[] = new CronogramaSheet($this->data['accesorios']);
        
        // Agrega la hoja Etiqueta
        $sheets[] = new EtiquetaSheet($this->data['etiqueta']);

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


class GeoestadisticasSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $geoestadisticas;

    public function __construct($geoestadisticas)
    {
        $this->geoestadisticas = $geoestadisticas;
    }

    public function headings(): array
    {
        return [
            'id_area',
            'id_municipio',
            'id_estado',
            'id_cliente',
            'nombre_localidad',
            'uso_posteria_solicitada',
        ];
    }

    public function collection()
    {
        return collect($this->geoestadisticas);
    }
}

class RutasSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $rutas;

    public function __construct($rutas)
    {
        $this->rutas = $rutas;
    }

    public function headings(): array
    {
        return [
            'id_ruta',
            'id_cliente',
            'colonia',
            'localidad',
            'municipio',
            'estado',
            'codigo_postal',
            'nombre_lugar_completo',
            'infraestructura_cfe_tercero',
            'inicio_ruta',
            'final_ruta',
            'numero_postes',
            'totalkm_cable',
        ];
    }

    public function collection()
    {
        return collect($this->rutas);
    }
}


class EnviadosSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $enviados;

    public function __construct($enviados)
    {
        $this->enviados = $enviados;
    }

    public function headings(): array
    {
        return [
            'id_envio',
            'id_cliente',
            'plano_adjunto',
            'ficha_tecnica_adjunto',
            'etiqueta_adjunto',
        ];
    }

    public function collection()
    {
        return collect($this->enviados);
    }
}


//SEGUNDO CUESTIONARIO


class InfraestructurasCFESheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $infraestructuras;

    public function __construct($infraestructuras)
    {
        $this->infraestructuras = $infraestructuras;
    }

    public function headings(): array
    {
        return [
            'id_infraestructuraCfe',
            'id_cliente',
            'no_poste',
            'descripcion',
            'latitud',
            'longitud',
            'distancia_interpostal',
            'tipo_fibra',
            'reserva_raqueta',
            'metros',
        ];
    }

    public function collection()
    {
        return collect($this->infraestructuras);
    }
}


class InfraestructurasCFEEquipoSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $infraestructurasEquipos;

    public function __construct($infraestructurasEquipos)
    {
        $this->infraestructurasEquipos = $infraestructurasEquipos;
    }

    public function headings(): array
    {
        return [
            'id_infraestructuraCfe_equipo',
            'id_cliente',
            'no_poste',
            'accesorio',
            'latitud',
            'longitud',
        ];
    }

    public function collection()
    {
        return collect($this->infraestructurasEquipos);
    }
}


class TendidosSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $tendidos;

    public function __construct($tendidos)
    {
        $this->tendidos = $tendidos;
    }

    public function headings(): array
    {
        return [
            'id_tendido',
            'id_cliente',
            'flejes_descripcion',
            'hebillas_descripcion',
            'herraje_tipoJ_descripcion',
            'herraje_tipoD_descripcion',
            'tensor_descripcion',
            'fibraOptica_descripcion',
            'cajas_distribucion',
            'cajas_empalme',
            'raquetas_descripcion',
        ];
    }

    public function collection()
    {
        return collect($this->tendidos);
    }
}


class LineaTroncalSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $lineaTroncal;

    public function __construct($lineaTroncal)
    {
        $this->lineaTroncal = $lineaTroncal;
    }

    public function headings(): array
    {
        return [
            'id_lineaTroncal',
            'nombre',
            'piezas',
            'peso_por_pieza',
            'id_cliente',
        ];
    }

    public function collection()
    {
        return collect($this->lineaTroncal);
    }
}


class LineaDistribucionSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $lineaDistribucion;

    public function __construct($lineaDistribucion)
    {
        $this->lineaDistribucion = $lineaDistribucion;
    }

    public function headings(): array
    {
        return [
            'id_lineaDistribucion',
            'nombre',
            'piezas',
            'peso_por_pieza',
            'id_cliente',
        ];
    }

    public function collection()
    {
        return collect($this->lineaDistribucion);
    }
}


class AccesoriosSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $accesorios;

    public function __construct($accesorios)
    {
        $this->accesorios = $accesorios;
    }

    public function headings(): array
    {
        return [
            'id_accesorio',
            'nombre',
            'piezas',
            'peso_por_pieza',
            'id_cliente',
        ];
    }

    public function collection()
    {
        return collect($this->accesorios);
    }
}

class CronogramaSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $cronograma;

    public function __construct($cronograma)
    {
        $this->cronograma = $cronograma;
    }

    public function headings(): array
    {
        return [
            'id_cronograma',
            'id_cliente',
            'proceso_construccion',
            'descripcion',
            'fechas_realizar',
        ];
    }

    public function collection()
    {
        return collect($this->cronograma);
    }
}


class EtiquetaSheet implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $etiqueta;

    public function __construct($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    public function headings(): array
    {
        return [
            'id_etiqueta',
            'id_cliente',
            'etiqueta_adjunto',
        ];
    }

    public function collection()
    {
        return collect($this->etiqueta);
    }
}

