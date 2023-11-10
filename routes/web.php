<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistroUsuarioController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\GeoestadisticaController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\InformacionPostesController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login'); // Esta es la ruta para procesar el inicio de sesión POST


Route::get('/registro_usuario', [RegistroUsuarioController::class, 'index'])->name('registro_usuario');
Route::get('/registro', [RegistroUsuarioController::class, 'index_usuario'])->name('registro');


Route::post('/guardar-usuario', [RegistroUsuarioController::class, 'guardar'])->name('guardar_usuario');


Route::get('/ver-usuario', [RegistroUsuarioController::class, 'verUsuarios'])->name('ver_usuario');
Route::get('/detallesUsuario/{id_usuario}','App\Http\Controllers\RegistroUsuarioController@datosUsuario');


Route::get('/editar_usuario', [RegistroUsuarioController::class, 'listaUsuariosEditar'])->name('editar_usuario');
Route::get('/editarUsuario/{id_usuario}','App\Http\Controllers\RegistroUsuarioController@editarUsuario');
Route::put('/actualizar-usuario/{id_usuario}', [RegistroUsuarioController::class, 'actualizarUsuario'])->name('actualizar_usuario');


Route::get('/eliminar_usuario', [RegistroUsuarioController::class, 'listaUsuariosEliminar'])->name('eliminar_usuario');
Route::get('/EliminarUsuario/{id_usuario}', 'App\Http\Controllers\RegistroUsuarioController@eliminarUsuario')->name('EliminarUsuario');
Route::get('/darDeBaja/{id_usuario}', 'App\Http\Controllers\RegistroUsuarioController@darDeBaja')->name('darDeBaja');
Route::get('/darDeAlta/{id_usuario}', 'App\Http\Controllers\RegistroUsuarioController@darDeAlta')->name('darDeAlta');

Route::post('/guardar_informacion', [InformacionController::class, 'guardar'])->name('guardar_informacion');
Route::get('/formRegistro/{id_cliente}', [InformacionController::class, 'index_geoestadistica'])->name('formRegistro');


Route::post('/guardar_geoestadisticas', [GeoestadisticaController::class, 'guardarGeoestadisticas'])->name('guardar_geoestadisticas');
Route::post('/guardar_ruta', [RutaController::class, 'guardar'])->name('guardar_ruta');
Route::get('/formRuta/{id_cliente}', [RutaController::class, 'indexRuta'])->name('formRuta');



Route::get('/formPlano/{id_cliente}', [PlanoController::class, 'indexPlano'])->name('formPlano');
Route::post('/marcar_enviado/{id_cliente}/{seccion}', [PlanoController::class, 'marcarEnviado'])->name('marcar_enviado');



Route::get('/informacion_postes', [InformacionPostesController::class, 'index'])->name('informacion_postes');








//cerrar sesion
Route::get('/salir', 'App\Http\Controllers\Auth\LoginController@salir')->name('salir');

//CONTRASEÑA: pAZfpMOV
//se quitó etiqueta adjunto en la tabla ArchivoAdjunto

