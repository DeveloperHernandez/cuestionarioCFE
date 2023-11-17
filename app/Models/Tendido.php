<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tendido extends Model
{
    use HasFactory;
    protected $table = 'Tendido';
    protected $primaryKey = 'id_tendido';
    public $timestamps = false;
    protected $fillable = ['id_tendido','id_cliente','flejes_descripcion','hebillas_descripcion','herraje_tipoJ_descripcion','herraje_tipoD_descripcion','tensor_descripcion','fibraOptica_descripcion','cajas_distribucion','cajas_empalme','raquetas_descripcion'];

}