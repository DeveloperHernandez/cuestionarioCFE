<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\PersonaAutorizada;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Support\Facades\Session;

class InformacionController extends Controller
{
    public function guardar(Request $request)
    {
        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
        ];

        $request->validate([
            'nombre_cliente' => 'required',
            'domicilio' => 'required',
            'correo_electronico' => 'required|email',
            'persona_autorizada' => 'required',
            'correos' => 'required',
            'telefonos' => 'required',
        ],$mensajes);

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

        
        Session::flash('success', 'La información guardada exitosamente.');
        // Redirige a la página "formRegistro" pasando el ID del cliente como parámetro
        return redirect()->route('formRegistro', ['id_cliente' => $clienteId])->withErrors($request->all());
    }

    //despues de seleccionar el boton guardar, nos vamos a la siguiente vista con el id_cliente
    public function index_geoestadistica($id_cliente)
    {
        $estados = Estado::all(); 
        $municipios = Municipio::all(); 
        return view('geoestadisticas', compact('municipios', 'estados', 'id_cliente'));
    }
}


