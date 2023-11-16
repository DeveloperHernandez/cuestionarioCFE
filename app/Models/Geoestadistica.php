<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geoestadistica extends Model
{
    use HasFactory;
    protected $table = 'areaGeoestadistica';
    protected $primaryKey = 'id_area';
    public $timestamps = false;
    protected $fillable = ['id_area','id_municipio','id_estado','id_cliente','nombre_localidad','uso_posteria_solicitada'];
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

}