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

Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/home', function() {
      if (Auth::user()->admin == 0) {
        return "view('livros.index')";
      } else {
        return "teste";
      }
    });
  });



Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'livros', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'livros',             'uses'=>'LivrosController@index']);
    Route::get('create',            ['as'=>'livros.create',      'uses'=>'LivrosController@create']);
    Route::get('{id}/destroy',      ['as'=>'livros.destroy',     'uses'=>'LivrosController@destroy']);
    Route::get('{id}/edit',         ['as'=>'livros.edit',        'uses'=>'LivrosController@edit']);
    Route::put('{id}/update',       ['as'=>'livros.update',      'uses'=>'LivrosController@update']);
    Route::post('store',            ['as'=>'livros.store',       'uses'=>'LivrosController@store']);
    Route::get('{id}visualizar',    ['as'=>'livros.visualizar',  'uses'=>'LivrosController@visualizar']);
});

Route::group(['prefix'=>'autores', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'autores',             'uses'=>'AutoresController@index']);
    Route::get('create',            ['as'=>'autores.create',      'uses'=>'AutoresController@create']);
    Route::get('{id}/destroy',      ['as'=>'autores.destroy',     'uses'=>'AutoresController@destroy']);
    Route::get('{id}/edit',         ['as'=>'autores.edit',        'uses'=>'AutoresController@edit']);
    Route::put('{id}/update',       ['as'=>'autores.update',      'uses'=>'AutoresController@update']);
    Route::post('store',            ['as'=>'autores.store',       'uses'=>'AutoresController@store']);
    Route::get('{id}visualizar',    ['as'=>'autores.visualizar',  'uses'=>'AutoresController@visualizar']);
});

Route::group(['prefix'=>'editoras', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'editoras',             'uses'=>'EditorasController@index']);
    Route::get('create',            ['as'=>'editoras.create',      'uses'=>'EditorasController@create']);
    Route::get('{id}/destroy',      ['as'=>'editoras.destroy',     'uses'=>'EditorasController@destroy']);
    Route::get('{id}/edit',         ['as'=>'editoras.edit',        'uses'=>'EditorasController@edit']);
    Route::put('{id}/update',       ['as'=>'editoras.update',      'uses'=>'EditorasController@update']);
    Route::post('store',            ['as'=>'editoras.store',       'uses'=>'EditorasController@store']);
    Route::get('{id}visualizar',    ['as'=>'editoras.visualizar',  'uses'=>'EditorasController@visualizar']);
});

Route::group(['prefix'=>'usuarios', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'usuarios',             'uses'=>'UsuariosController@index']);
    Route::get('create',            ['as'=>'usuarios.create',      'uses'=>'UsuariosController@create']);
    Route::get('{id}/destroy',      ['as'=>'usuarios.destroy',     'uses'=>'UsuariosController@destroy']);
    Route::get('{id}/edit',         ['as'=>'usuarios.edit',        'uses'=>'UsuariosController@edit']);
    Route::put('{id}/update',       ['as'=>'usuarios.update',      'uses'=>'UsuariosController@update']);
    Route::post('store',            ['as'=>'usuarios.store',       'uses'=>'UsuariosController@store']);
    Route::get('{id}visualizar',    ['as'=>'usuarios.visualizar',  'uses'=>'UsuariosController@visualizar']);
});

Route::group(['prefix'=>'emprestimos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('create',            ['as'=>'emprestimos.create',      'uses'=>'EmprestimosController@create']);
    Route::post('store',            ['as'=>'emprestimos.store',       'uses'=>'EmprestimosController@store']);
});
