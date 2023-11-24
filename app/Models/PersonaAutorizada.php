<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaAutorizada extends Model
{
    use HasFactory;
    protected $table = 'PersonaAutorizada';
    protected $primaryKey = 'id_personaAutorizada';
    public $timestamps = false;
    protected $fillable = ['id_personaAutorizada','nombres','correos','numeros_telefonicos'];


    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id_personaAutorizada');
    }



}