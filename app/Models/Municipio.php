<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'Municipio';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;
    protected $fillable = ['id_municipio','nombre_municipio','id_estado'];
}