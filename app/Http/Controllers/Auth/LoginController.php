<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                if ($roles[$ver->rol] === 2) {
                    return redirect()->route('registro_usuario'); // Redirige al panel de administrador
                } elseif ($roles[$ver->rol] === 1) {
                    return redirect()->route('registro'); // Redirige a la vista de usuario normal
                }
            }
        }
    
        // Autenticación fallida
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }
    
    
    public function salir()
    {
        Auth::logout(); // Cierra la sesión del usuario
        return redirect('/login'); // Redirige al usuario a la página de inicio u otra página de tu elección
    }

}