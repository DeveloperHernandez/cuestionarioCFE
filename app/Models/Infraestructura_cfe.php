<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Infraestructura_cfe extends Model
{
    use HasFactory;
    protected $table = 'Infraestructura_cfe';
    protected $primaryKey = 'id_infraestructuraCfe';
    public $timestamps = false;
    protected $fillable = ['id_infraestructuraCfe','id_cliente','no_poste','descripcion','latitud','longitud','distancia_interpostal','tipo_fibra','reserva_raqueta','metros'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

}