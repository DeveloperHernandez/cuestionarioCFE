<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'Usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $fillable=['id_usuario','nombre_usuario','apellido_paterno','apellido_materno','telefono','correo_electronico','contrasenia','rol'];
}
