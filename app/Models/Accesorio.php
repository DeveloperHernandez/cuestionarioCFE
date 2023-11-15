<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;
    protected $table = 'Accesorio';
    protected $primaryKey = 'id_accesorio';
    public $timestamps = false;
    protected $fillable = ['id_accesorio','id_cliente','nombre','peso_por_pieza'];
}