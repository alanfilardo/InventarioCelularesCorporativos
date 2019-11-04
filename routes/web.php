<?php

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

use App\Models\ModelosEquipos;

Route::get('/', 'Controller@index')->name('inicio');
Route::post('/buscador', 'BuscadorController@buscarcliente')->name('buscar_clientes');

Route::group(['prefix' => 'paises', 'namespace' => 'Paises'], function () {
    Route::get('/index', 'PaisesController@index')->name('paises');
    Route::get('crear', 'PaisesController@create')->name('crear_pais');
    Route::post('/guardar', 'PaisesController@store')->name('guardar_pais');
    Route::get('/editar/{id}', 'PaisesController@edit')->name('editar_pais');
    Route::get('/{id}', 'PaisesController@destroy')->name('eliminar_pais');
    Route::post('/{id}', 'PaisesController@update')->name('actualizar_pais');
});

Route::group(['prefix' => 'provincias', 'namespace' => 'Provincias'], function () {
    Route::get('/index', 'ProvinciaController@index')->name('provincias');
    Route::get('crear', 'ProvinciaController@create')->name('crear_provincia');
    Route::post('/guardar', 'ProvinciaController@store')->name('guardar_provincia');
    Route::get('/editar/{id}', 'ProvinciaController@edit')->name('editar_provincia');
    Route::get('/{id}', 'ProvinciaController@destroy')->name('eliminar_provincia');
    Route::post('/{id}', 'ProvinciaController@update')->name('actualizar_provincia');
});

Route::group(['prefix' => 'sucursales', 'namespace' => 'Sucursales'], function () {
    Route::get('/index', 'SucursalesController@index')->name('sucursales');
    Route::get('crear', 'SucursalesController@create')->name('crear_sucursal');
    Route::post('/guardar', 'SucursalesController@store')->name('guardar_sucursal');
    Route::get('/editar/{id}', 'SucursalesController@edit')->name('editar_sucursal');
    Route::get('/{id}', 'SucursalesController@destroy')->name('eliminar_sucursal');
    Route::post('/{id}', 'SucursalesController@update')->name('actualizar_sucursal');
});

Route::group(['prefix' => 'lineas', 'namespace' => 'Lineas'], function () {
    Route::get('/index', 'LineasController@index')->name('lineas');
    Route::get('crear', 'LineasController@create')->name('crear_linea');
    Route::post('/guardar', 'LineasController@store')->name('guardar_linea');
    Route::get('/editar/{id}', 'LineasController@edit')->name('editar_linea');
    Route::get('/{id}', 'LineasController@destroy')->name('eliminar_linea');
    Route::post('/{id}', 'LineasController@update')->name('actualizar_linea');
});

Route::group(['prefix' => 'equipos', 'namespace' => 'Equipos'], function () {
    Route::get('/index', 'EquiposController@indexEquipos')->name('equipos');
    Route::get('crear', 'EquiposController@createEquipos')->name('crear_equipo');
    Route::post('/guardar', 'EquiposController@storeEquipos')->name('guardar_equipo');
    Route::post('/stock/libre', 'EquiposController@stockEquipos')->name('stock_equipos');
    Route::get('equipo/{id}', 'EquiposController@editEquipo')->name('editar_equipo');
    Route::get('/{id}', 'EquiposController@destroyEquipo')->name('eliminar_equipo');
    Route::post('/{id}', 'EquiposController@updateEquipo')->name('actualizar_equipo');

    Route::get('marcas/index', 'EquiposController@indexMarcas')->name('marcas');
    Route::get('marcas/crear', 'EquiposController@createMarcas')->name('crear_marca');
    Route::post('marcas/guardar', 'EquiposController@storeMarcas')->name('guardar_marca');
    Route::get('/marca/{id}', 'EquiposController@editMarca')->name('editar_marca');
    Route::get('/marcas/{id}', 'EquiposController@destroyMarca')->name('eliminar_marca');
    Route::post('/marcas/{id}', 'EquiposController@updateMarca')->name('actualizar_marca');

    Route::get('modelos/index', 'EquiposController@indexModelos')->name('modelos');
    Route::get('modelos/crear', 'EquiposController@createModelos')->name('crear_modelo');
    Route::post('modelos/guardar', 'EquiposController@storeModelos')->name('guardar_modelo');
    Route::get('/modelo/{id}', 'EquiposController@editModelo')->name('editar_modelo');
    Route::get('/modelos/{id}', 'EquiposController@destroyModelo')->name('eliminar_modelo');
    Route::post('/modelos/{id}', 'EquiposController@updateModelo')->name('actualizar_modelo');
});

Route::group(['prefix' => 'clientes', 'namespace' => 'Clientes'], function () {
    Route::get('/index', 'ClientesController@index')->name('clientes');
    Route::get('crear', 'ClientesController@create')->name('crear_cliente');
    Route::get('/ver/{id}', 'ClientesController@show')->name('ver_cliente');
    Route::post('/guardar', 'ClientesController@store')->name('guardar_cliente');
    Route::get('/editar/{id}', 'ClientesController@edit')->name('editar_cliente');
    Route::get('/{id}', 'ClientesController@destroy')->name('eliminar_cliente');
    Route::post('/{id}', 'ClientesController@update')->name('actualizar_cliente');
});
