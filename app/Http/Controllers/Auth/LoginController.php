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
            // Verifica el rol del usuario
            if (isset($roles[$ver->rol])) {
                // Limpiar la sesión antes de almacenar el nuevo usuario
                Session::flush();  
                $userSessions = Session::get('user_sessions');
    
                // Almacena la información del usuario en la sesión personalizada
                $userSessions[$ver->id_usuario] = [
                    'nombre_usuario' => $ver->nombre_usuario,
                    'correo_electronico' => $ver->correo_electronico,
                    'rol' => $ver->rol,
                    // Agrega cualquier otra información que desees almacenar
                ];
    
                Session::put('user_sessions', $userSessions);
    
                if (($roles[$ver->rol] === 2) && ($ver->estado === 'activo')) {
                    return redirect()->route('registro_usuario');
                } elseif (($roles[$ver->rol] === 1) && ($ver->estado === 'activo')) {
                    return redirect()->route('registro');
                }
            }
        }
    
        // Autenticación fallida
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }
    
    public function salir()
    {
        Auth::logout(); 
        return redirect('/login');
    }

}
