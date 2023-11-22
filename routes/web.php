<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistroUsuarioController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\GeoestadisticaController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\DescargaController;
use App\Http\Controllers\InformacionPostesController;
use App\Http\Controllers\InformacionPostesEquipoController;
use App\Http\Controllers\LineaTroncalController;
use App\Http\Controllers\LineaDistribucionController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\EnviadoController;
use App\Http\Controllers\TendidoController;


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login'); 


Route::get('/registro_usuario', [RegistroUsuarioController::class, 'index'])->name('registro_usuario');
Route::get('/registro', [RegistroUsuarioController::class, 'index_usuario'])->name('registro');


Route::post('/guardar-usuario', [RegistroUsuarioController::class, 'guardar'])->name('guardar_usuario');


Route::get('/ver-usuario', [RegistroUsuarioController::class, 'verUsuarios'])->name('ver_usuario');
Route::get('/detallesUsuario/{id_usuario}','App\Http\Controllers\RegistroUsuarioController@datosUsuario');

//para exportar excel del usuario
Route::get('/exportar-usuario/{id_usuario}','App\Http\Controllers\DocumentoController@exportarUsuario');


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
Route::get('/siguiente_geoestadistica', [GeoestadisticaController::class, 'indexGeoestadistica'])->name('siguiente_geoestadistica');


Route::post('/guardar_ruta', [RutaController::class, 'guardar'])->name('guardar_ruta');
Route::get('/formRuta/{id_cliente}', [RutaController::class, 'indexRuta'])->name('formRuta');
Route::get('/siguiente_ruta', [RutaController::class, 'rutaSiguiente'])->name('siguiente_ruta');


Route::get('/formPlano/{id_cliente}', [PlanoController::class, 'indexPlano'])->name('formPlano');
Route::post('/marcar_enviado/{id_cliente}/{seccion}', [PlanoController::class, 'marcarEnviado'])->name('marcar_enviado');
Route::get('/siguiente_plano', [PlanoController::class, 'planoSiguiente'])->name('siguiente_plano');



//SEGUNDA PARTE
Route::get('/informacion_postes', [InformacionPostesController::class, 'index'])->name('informacion_postes');
Route::post('/guardar_cfe', [InformacionPostesController::class, 'guardarInfraestructuraCfe'])->name('guardar_cfe');


Route::get('/informacion_postes_equipo/{id_cliente}', [InformacionPostesEquipoController::class, 'index'])->name('informacion_postes_equipo');
Route::post('/guardar_cfe_equipo', [InformacionPostesEquipoController::class, 'guardarInfraestructuraCfeEquipo'])->name('guardar_cfe_equipo');
Route::get('/siguiente_inf_cfe_equipo', [InformacionPostesEquipoController::class, 'index'])->name('siguiente_inf_cfe_equipo');


Route::get('/tendido/{id_cliente}', [TendidoController::class, 'indexTendido'])->name('tendido');
Route::post('/guardar_tendido', [TendidoController::class, 'guardarTendido'])->name('guardar_tendido');
Route::get('/siguiente_tendido', [TendidoController::class, 'indexTendido'])->name('siguiente_tendido');



Route::get('/lineaTroncal/{id_cliente}', [LineaTroncalController::class, 'index'])->name('lineaTroncal');
Route::post('/guardar_linea_troncal', [LineaTroncalController::class, 'guardarLineaTroncal'])->name('guardar_linea_troncal');
Route::get('/siguiente_troncal', [LineaTroncalController::class, 'index'])->name('siguiente_troncal');


Route::get('/lineaDistribucion/{id_cliente}', [LineaDistribucionController::class, 'index'])->name('lineaDistribucion');
Route::post('/guardar_linea_distribucion', [LineaDistribucionController::class, 'guardarLineaDistribucion'])->name('guardar_linea_distribucion');
Route::get('/siguiente_distribucion', [LineaDistribucionController::class, 'index'])->name('siguiente_distribucion');



Route::get('/accesorios/{id_cliente}', [AccesorioController::class, 'index'])->name('accesorios');
Route::post('/guardar_accesorio', [AccesorioController::class, 'guardarAccesorio'])->name('guardar_accesorio');
Route::get('/siguiente_accesorio', [AccesorioController::class, 'index'])->name('siguiente_accesorio');


Route::get('/cronograma/{id_cliente}', [CronogramaController::class, 'index'])->name('cronograma');
Route::post('/guardar_cronograma', [CronogramaController::class, 'guardarCronograma'])->name('guardar_cronograma');
Route::get('/siguiente_cronograma', [CronogramaController::class, 'index'])->name('siguiente_cronograma');



Route::get('/etiqueta/{id_cliente}', [EtiquetaController::class, 'index'])->name('etiqueta');
Route::get('/siguiente_etiqueta', [EtiquetaController::class, 'index'])->name('siguiente_etiqueta');



Route::post('/marcar_enviado_plano_adjunto', [EnviadoController::class, 'guardarPlano'])->name('marcar_enviado_plano_adjunto');
Route::post('/marcar_enviado_ficha_tecnica_adjunto', [EnviadoController::class, 'guardarFicha'])->name('marcar_enviado_ficha_tecnica_adjunto');


Route::post('/marcar_enviado_etiqueta', [EtiquetaController::class, 'guardarEtiqueta'])->name('marcar_enviado_etiqueta');




//ADMIN: DOCUMENTO
Route::get('/ver_cliente_documento', [DescargaController::class, 'verClientesDocumento'])->name('ver_cliente_documento');



//CERRAR SESION
Route::get('/salir', 'App\Http\Controllers\Auth\LoginController@salir')->name('salir');
