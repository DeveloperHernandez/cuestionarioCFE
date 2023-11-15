<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class LineaTroncal extends Model
{
    use HasFactory;
    protected $table = 'LineaTroncal';
    protected $primaryKey = 'id_lineaTroncal';
    public $timestamps = false;
    protected $fillable = ['id_lineaTroncal','id_cliente','nombre','piezas','peso_por_pieza'];
}