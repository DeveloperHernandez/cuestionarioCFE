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
            'persona_autorizada' => 'required|array',
            'persona_autorizada.*' => 'required',
            'correos' => 'required|array',
            'correos.*' => 'required',
            'telefonos' => 'required|array',
            'telefonos.*' => 'required',
        ], $mensajes);

        if ($request->no_poste) {
            foreach ($request->no_poste as $key => $no_poste) {
                $registroPoste = new PersonaAutorizada();
                $registroPoste->id_personaAutorizada = $id_personaAutorizada;
                $registroPoste->domicilio = $request->domicilio[$key];
                $registroPoste->correo_electronico = $request->correo_electronico[$key];
                $registroPoste->persona_autorizada = $request->persona_autorizada[$key];
                $registroPoste->correos = $request->correos[$key];
                $registroPoste->telefonos = $request->telefonos[$key];
                $registroPoste->save();
            }
        }
        // Busca un cliente existente por correo electrónico
        $clienteExistente = Cliente::where('correo_electronico', $request->correo_electronico)->first();
    
        if ($clienteExistente) {
            // Si el cliente ya existe, actualiza la información
            $clienteExistente->update([
                'nombre_cliente' => $request->nombre_cliente,
                'domicilio' => $request->domicilio,
            ]);
    
            $clienteExistente->personaAutorizada()->update([
                'nombres' => $request->persona_autorizada,
                'correos' => $request->correos,
                'numeros_telefonicos' => $request->telefonos,
            ]);
    
            // Obtiene el ID del cliente existente
            $clienteId = $clienteExistente->id_cliente;
        } else {
            // Si el cliente no existe, crea uno nuevo
            $personaAutorizada = PersonaAutorizada::create([
                'nombres' => $request->persona_autorizada,
                'correos' => $request->correos,
                'numeros_telefonicos' => $request->telefonos,
            ]);
    
            $registroPrincipal = new Cliente([
                'nombre_cliente' => $request->nombre_cliente,
                'domicilio' => $request->domicilio,
                'correo_electronico' => $request->correo_electronico,
            ]);
    
            $personaAutorizada->cliente()->save($registroPrincipal);
    
            // Obtiene el ID del cliente recién creado
            $clienteId = $registroPrincipal->id_cliente;
        }
    
        Session::flash('success', 'La información se guardó exitosamente.');
        // Redirige a la página "formRegistro" pasando el ID del cliente como parámetro
        return redirect()->route('formRegistro', ['id_cliente' => $clienteId])->withErrors($request->all());
    }

    //despues de seleccionar el boton guardar, nos vamos a la siguiente vista con el id_cliente
    public function index_geoestadistica()
    {
        $estados = Estado::all(); 
        $municipios = Municipio::all();
        $ver = session('user');
        if ($ver) {
            return view('geoestadisticas', compact('municipios', 'estados', 'ver'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }


    
}


