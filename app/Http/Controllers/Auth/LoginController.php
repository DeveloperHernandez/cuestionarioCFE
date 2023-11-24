<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class LoginController extends Controller
{
   
    public function login(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'passwords' => 'required'
        ], [
            'nombre_cliente.required' => 'El campo :attribute es obligatorio.',
            'passwords.required' => 'El campo :attribute es obligatorio.'
        ], [
            'nombre_cliente' => 'clave de empleado',
            'passwords' => 'contraseña'
        ]);
        
        $user = $request->nombre_cliente;
        $pass = $request->passwords;
        
        $ver = Usuario::select('id_usuario', 'nombre_usuario', 'apellido_paterno', 'apellido_materno', 'telefono', 'correo_electronico', 'contrasenia', 'rol', 'estado')
            ->where('nombre_usuario', $user)
            ->first();
    
        $roles = [
            'ADMINISTRADOR' => 2,
            'USUARIO' => 1
        ];
        if ($ver) {
            if ($ver && password_verify($pass, $ver->contrasenia)) {
                // Autenticación exitosa
                session(['user' => [
                    'id_usuario' => $ver->id_usuario,
                    'nombre_usuario' => $ver->nombre_usuario,
                    'correo_electronico' => $ver->correo_electronico,
                    'rol' => $ver->rol,
                ]]);
    
                if ($ver->rol === 'ADMINISTRADOR' && $ver->estado === 'activo') {
                    return redirect()->route('registro_usuario');
                } elseif ($ver->rol === 'USUARIO' && $ver->estado === 'activo') {
                    return redirect()->route('registro');
                }
            }
        }
        // Autenticación fallida
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }
    
    
    public function salir()
    {
        session(['rol' => 0]);
        session(['user' => null]);
        return redirect('/login');
    }

}


