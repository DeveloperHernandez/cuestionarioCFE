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
    protected $fillable = ['id_cliente','id_personaAutorizada','nombre_cliente','domicilio','correo_electronico'];

   
    
    public function geoestadisticos()
    {
        return $this->hasMany(Geoestadistica::class, 'id_cliente');
    }
    
    public function personaAutorizada()
    {
        return $this->hasOne(PersonaAutorizada::class, 'id_cliente');
    }

}