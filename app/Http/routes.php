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
    'uses' => 'UsuarioController@getInicio',
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

Route::group(['middleware'=>['web']], function() {

});