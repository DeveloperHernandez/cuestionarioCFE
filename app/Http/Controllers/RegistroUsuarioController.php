<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session; // Agrega esta línea

class RegistroUsuarioController extends Controller
{
    public function index()
    {
        $userSessions = Session::get('user_sessions');
        if (!empty($userSessions)) {
            $ver = reset($userSessions);              
            return view('admin.registro_usuario', compact('ver'));
          } else {
              return redirect()->route('login')->with('error', 'Usuario no autenticado');
          }
    }

    public function index_usuario()
    {
        // Obtén la variable $ver desde la sesión
        $userSessions = Session::get('user_sessions');

        // Asegúrate de que $userSessions no esté vacío antes de acceder a sus elementos
        if (!empty($userSessions)) {
            // Obtén el primer elemento del array
            $ver = reset($userSessions);

            // Ahora, $ver contiene la información del usuario
            return view('registro', compact('ver'));
        } else {
            // Manejar la lógica si la variable no está definida
            return redirect()->route('login')->with('error', 'Usuario no autenticado');
        }
    }   
/*
    public function index_usuario()
    {
        return view('registro');
    }
*/
    public function guardar(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre_usuario' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'contrasenia' => 'required',
            'rol' => 'required',
        ]);

        $contraseniaHasheada = bcrypt($request->input('contrasenia'));
        // Crea un nuevo usuario en la base de datos
        Usuario::create([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'telefono' => $request->input('telefono'),
            'correo_electronico' => $request->input('correo_electronico'),
            'contrasenia' => $contraseniaHasheada, // Guarda la contraseña hasheada
            'rol' => $request->input('rol'),
        ]);
        return redirect()->route('registro_usuario')->with('success', 'Usuario registrado con éxito');
    }

    public function verUsuarios()
    {
        $usuarios = Usuario::where('estado', 'activo')->get();
        return view('admin.ver_usuario', ['usuarios' => $usuarios]);
    }

    public function listaUsuariosEditar()
    {
        $usuarios = Usuario::where('estado', 'activo')->get();
        return view('admin.listaEditar', ['usuarios' => $usuarios]);
    }

    public function listaUsuariosEliminar()
    {
        $usuarios = Usuario::all();
        return view('admin.listaEliminar', ['usuarios' => $usuarios]);
    }


    public function editarUsuario($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        if ($usuario) {
            return view('admin.editar', ['usuario' => $usuario]);
        } else {
            return redirect()->route('ver_usuario')->with('error', 'Usuario no encontrado');
        }
    }

    public function actualizarUsuario(Request $request, $id_usuario)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre_usuario' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'rol' => 'required',
        ]);

        // Obtiene el usuario existente
        $usuario = Usuario::find($id_usuario);

        // Actualiza los campos del usuario con los valores del formulario
        $usuario->nombre_usuario = $request->input('nombre_usuario');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->telefono = $request->input('telefono');
        $usuario->correo_electronico = $request->input('correo_electronico');
        $usuario->rol = $request->input('rol');

        // Verifica si se proporcionó una nueva contraseña
        if ($request->has('contrasenia')) {
            // Hashea la nueva contraseña y la actualiza en la base de datos
            $nuevaContraseniaHasheada = bcrypt($request->input('contrasenia'));
            $usuario->contrasenia = $nuevaContraseniaHasheada;
        }

        // Guarda los cambios en el usuario
        $usuario->save();

        return redirect()->route('editar_usuario')->with('success', 'Usuario actualizado con éxito');
    }



    public function datosUsuario($id_usuario)
    {

        $usuarios = Usuario::select(
            'id_usuario',
            'nombre_usuario',
            'apellido_paterno',
            'apellido_materno',
            'telefono',
            'correo_electronico',
            'contrasenia',
            'rol'
        )
        ->where('id_usuario', $id_usuario)
        ->get();

        return view('admin.ver_usuario_unico', compact('usuarios'));
    }

    public function exportarUsuario($id_usuario)
    {
        $usuario = Usuario::findOrFail($id_usuario); // Obtén el usuario por su ID
    
        // Crear un objeto de exportación pasando un array con un solo usuario
        $export = new UsuariosExport([$usuario]);
    
        // Generar y descargar el archivo Excel
        return Excel::download($export, 'usuario.xlsx');
    }
    
    


    public function eliminarUsuario($id_usuario)
    {
        Usuario::where('id_usuario', $id_usuario)->delete();
        return redirect()->route('eliminar_usuario')->with('success', 'Usuario eliminado con éxito');
    }

    public function darDeBaja($id_usuario)
    {
        Usuario::where('id_usuario', $id_usuario)->update(['estado' => 'inactivo']);

        return redirect()->route('eliminar_usuario')->with('success', 'Usuario dado de baja con éxito');
    }

    public function darDeAlta($id_usuario)
    {
        Usuario::where('id_usuario', $id_usuario)->update(['estado' => 'activo']);

        return redirect()->route('eliminar_usuario')->with('success', 'Usuario dado de alta con éxito');
    }



}