<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;
    protected $fillable = ['id_municipio','municipio'];
}