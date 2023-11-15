<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class LineaDistribucion extends Model
{
    use HasFactory;
    protected $table = 'LineaDistribucion';
    protected $primaryKey = 'id_lineaDistribucion';
    public $timestamps = false;
    protected $fillable = ['id_lineaDistribucion','id_cliente','nombre','piezas','peso_por_pieza'];
}