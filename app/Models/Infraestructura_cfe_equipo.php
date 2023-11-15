<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Infraestructura_cfe_equipo extends Model
{
    use HasFactory;
    protected $table = 'Infraestructura_cfe_equipo';
    protected $primaryKey = 'id_infraestructuraCfe_equipo';
    public $timestamps = false;
    protected $fillable = ['id_infraestructuraCfe_equipo','id_cliente','no_poste','accesorio','latitud','longitud'];

}

