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

/*Route::get('/template', function () {
    return view('template');
});
*/
//Auth::routes();

//Route::get('/', 'HomeController@index');
Route::post('/registrar', 'UserController@registrar');
Route::post('/logear', 'UserController@login');
Route::get('/register', 'AuthController@register');
Route::get('/', 'AuthController@index');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/inicio', function () {
        return view('paciente/inicio');
    });
    Route::get('/perfil', 'UserController@index');
    Route::post('/guardar_perfil', 'UserController@save');

    Route::get('/historial', 'HistoriasController@index');
    Route::get('/detalle/{id}/{id_doctor}','HistoriasController@verDetalle');

    Route::get('/agregar_historia','HistoriasController@ver');
    Route::post('/guardar_historia', 'HistoriasController@save');

    Route::get('/autorizar', 'AutorizacionesController@index');
    Route::get('/odontograma', 'OdontogramaController@index');

    /*Rutas del Doctor*/
    Route::get('/inicio_doc', function () {
        return view('doctor/inicio');
    });
    Route::get('/perfil_doc', function () {
        return view('doctor/perfil');
    });
    Route::get('/pacientes', function () {
        return view('doctor/pacientes');
    });

    Route::get('/logout', 'AuthController@logout');

});