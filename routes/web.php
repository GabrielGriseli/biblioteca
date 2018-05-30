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


Route::group(['prefix'=>'emprestimos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('create',            ['as'=>'emprestimos.create',      'uses'=>'EmprestimosController@create']);
    Route::post('store',            ['as'=>'emprestimos.store',       'uses'=>'EmprestimosController@store']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'users', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'users',             'uses'=>'UsersController@index']);
});