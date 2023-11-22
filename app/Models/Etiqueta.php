<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    protected $table = 'Etiqueta';
    protected $primaryKey = 'id_etiqueta';
    public $timestamps = false;
    protected $fillable = ['id_etiqueta','id_cliente','etiqueta_adjunto'];
}