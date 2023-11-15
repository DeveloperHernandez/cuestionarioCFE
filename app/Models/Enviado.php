<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enviado extends Model
{
    use HasFactory;
    protected $table = 'Enviado';
    protected $primaryKey = 'id_envio';
    public $timestamps = false;
    protected $fillable = ['id_envio','id_cliente','plano_adjunto','ficha_tecnica_adjunto','etiqueta_adjunto'];
}