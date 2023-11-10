<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\PersonaAutorizada;
use App\Models\Estado;
use App\Models\Municipio;

class InformacionController extends Controller
{
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'domicilio' => 'required',
            'correo_electronico' => 'required|email',
            'persona_autorizada' => 'required',
            'correos' => 'required',
            'telefonos' => 'required',
        ]);

        // Crea un registro en la tabla "PersonaAutorizada"
        $personaAutorizada = PersonaAutorizada::create([
            'nombres' => $request->persona_autorizada,
            'correos' => $request->correos,
            'numeros_telefonicos' => $request->telefonos,
        ]);

        // Crea un registro en la tabla "Cliente" relacionado con "PersonaAutorizada"
        $registroPrincipal = new Cliente([
            'nombre_cliente' => $request->nombre_cliente,
            'domicilio' => $request->domicilio,
            'correo_electronico' => $request->correo_electronico,
        ]);

        $personaAutorizada->cliente()->save($registroPrincipal);
        // Obtiene el ID del cliente recién creado
        $clienteId = $registroPrincipal->id_cliente;

        // Redirige a la página "formRegistro" pasando el ID del cliente como parámetro
        return redirect()->route('formRegistro', ['id_cliente' => $clienteId]);
    }

    public function index_geoestadistica($id_cliente)
    {
        $estados = Estado::all(); // Obtener todos los estados
        $localidades = Municipio::all(); // Obtener todas las localidades

        return view('geoestadisticas', compact('localidades', 'estados', 'id_cliente'));

    }

}