<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'Cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;
    protected $fillable = ['id_cliente','id_area','id_usuario','id_posteria','id_cronograma','id_personaAutorizada','nombre_cliente','domicilio','correo_electronico'];


    public function personaAutorizada()
    {
        return $this->belongsTo(PersonaAutorizada::class, 'id_personaAutorizada');
    }
    
    public function geoestadisticos()
    {
        return $this->hasMany(Geoestadistica::class, 'id_cliente');
    }
    


}