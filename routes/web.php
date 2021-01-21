<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Categoria;
use App\Referencia;
use App\Equipo;
use App\Observacion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/servicio-especial/ver/{id}', 'ServicioEspecialController@ver_contrato')->name('ver-contrato');


// Rutas para Equipos
Route::group(['middleware' => ['permission:equipos|universal']], function () {
    Route::resource('/nuevo','EquiposController');
    Route::get('/equipos/nuevo_inventario','EquiposController@nuevo');
    Route::post('/equipos/insertar_categoria','EquiposController@insertarCategoria');
    Route::post('/equipos/nuevo','EquiposController@insertarObservacion')->name('nuevo');
    Route::get('/equipos/editar/{id}','EquiposController@editar')->name('modificar');
    Route::post('/modificar/{id}','EquiposController@update')->name('update');
    Route::get('/equipos/nueva_observacion/{id}','EquiposController@agregarObservacion')->name('AgregarObservacion');
    Route::get('/equipos/{categoria}/{id}','EquiposController@equipos');
    Route::delete('eliminar/{id}','EquiposController@eliminar')->name('EliminarEquipo');
    Route::get('/equipos/ver_equipo/{categoria}/{id}', 'EquiposController@verEquipo');
    Route::get('/equipos','EquiposController@index')->name('equipos');
    Route::get('/equipos/{id}','EquiposController@busqueda')->name('busqueda');
    Route::get('/equipos/ver_equipoqr/{categoria}/{id}', ['middleware' => 'auth', 'uses' => 'EquiposController@ver_qr']); 
});


// Rutas para Servicio Especial
Route::group(['middleware' => ['permission:servicio especial|universal']], function () {
    Route::get('/servicio-especial', 'ServicioEspecialController@index')->name('servicio-especial');
    Route::get('/servicio-especial/crear', 'ServicioEspecialController@crear');
    Route::post('/servicio-especial/create', 'ServicioEspecialController@create');
    Route::get('/servicio-especial/ver_contrato/{id}', 'ServicioEspecialController@ver_contrato')->name('ver-contrato');
});
