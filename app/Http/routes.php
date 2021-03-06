<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/registrar', [
    'uses' => 'UsuarioController@postRegistrar',
    'as' => 'registrar'
]);

Route::post('/ingresar', [
    'uses' => 'UsuarioController@postIngresar',
    'as' => 'ingresar'
]);

Route::get('/inicio', [
    'uses' => 'PostController@getInicio',
    'as' => 'inicio',
    'middleware' => 'auth',
]);

Route::get('/salir', [
    'uses' => 'UsuarioController@salir',
    'as' => 'salir',
]);

Route::get('/', [
    'uses' => 'UsuarioController@getLogin',
    'as' => 'login',
]);

Route::post('/crearpost',[
    'uses' => 'PostController@postCrearPost',
    'as' => 'crear_post',
    'middleware' => 'auth',
]);
Route::get('/eliminarPost/{id}',[
    'uses' => 'PostController@getEliminarPost',
    'as' => 'eliminarPost',
    'middleware' => 'auth',
]);

Route::post('/editarPost', [
    'uses'=>'PostController@postEditarPost',
    'as' => 'editarPost',
    'middleware' => 'auth'
]);

Route::get('/perfil', [
    'uses' => 'UsuarioController@getPerfil',
    'as' => 'perfil',
    'middleware' => 'auth'
]);
Route::post('/guardar_perfil', [
    'uses' => 'UsuarioController@postGuardarPerfil',
    'as' => 'guardar_perfil',
    'middleware' => 'auth'
]);

Route::post('/like', [
    'uses' => 'LikeController@postLike',
    'as' => 'like',
    'middleware' => 'auth'
]);

Route::get('/imagen_usuario/{filename}', [
    'uses' => 'UsuarioController@getImagenUsuario',
    'as' => 'imagen_usuario',
    'middleware' => 'auth'
]);