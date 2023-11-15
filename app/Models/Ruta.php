<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'Ruta';
    protected $primaryKey = 'id_ruta';
    public $timestamps = false;
    protected $fillable = ['id_ruta','id_cliente','colonia','localidad','municipio','estado','codigo_postal','nombre_lugar_completo','infraestructura_cfe_tercero','inicio_ruta','final_ruta','numero_postes','totalkm_cable'];

}