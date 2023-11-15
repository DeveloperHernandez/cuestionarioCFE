<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;
    protected $table = 'Cronograma';
    protected $primaryKey = 'id_cronograma';
    public $timestamps = false;
    protected $fillable = ['id_cronograma','id_cliente','proceso_construccion','descripcion','fechas_realizar'];
}