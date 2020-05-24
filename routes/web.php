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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/empleados', 'EmpleadoController@index');
Route::get('/empleados/nuevo', 'EmpleadoController@create');
Route::post('/empleados/nuevo', 'EmpleadoController@createUpdate');
Route::any('/empleados/actualizar/{id}', 'EmpleadoController@update');
Route::any('/empleados/eliminar/{id}', 'EmpleadoController@delete');

Route::get('/cargos', 'CargoController@index');
Route::get('/cargos/nuevo', 'CargoController@create');
Route::post('/cargos/nuevo', 'CargoController@createUpdate');
Route::any('/cargos/actualizar/{id}', 'CargoController@update');
Route::any('/cargos/eliminar/{id}', 'CargoController@delete');

Route::any('/reportes', 'EmpleadoController@reportes');
