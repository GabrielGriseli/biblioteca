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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

///livros
Route::group(['prefix'=>'livros', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'livros',             'uses'=>'LivrosController@index']);
    Route::get('create',            ['as'=>'livros.create',      'uses'=>'LivrosController@create',         'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/destroy',      ['as'=>'livros.destroy',     'uses'=>'LivrosController@destroy',        'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/edit',         ['as'=>'livros.edit',        'uses'=>'LivrosController@edit',           'middleware' => ['auth', 'superadmin']]);
    Route::put('{id}/update',       ['as'=>'livros.update',      'uses'=>'LivrosController@update',         'middleware' => ['auth', 'superadmin']]);
    Route::post('store',            ['as'=>'livros.store',       'uses'=>'LivrosController@store',          'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}visualizar',    ['as'=>'livros.visualizar',  'uses'=>'LivrosController@visualizar']);
});

///autores
Route::group(['prefix'=>'autores', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'autores',             'uses'=>'AutoresController@index']);
    Route::get('create',            ['as'=>'autores.create',      'uses'=>'AutoresController@create',       'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/destroy',      ['as'=>'autores.destroy',     'uses'=>'AutoresController@destroy',      'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/edit',         ['as'=>'autores.edit',        'uses'=>'AutoresController@edit',         'middleware' => ['auth', 'superadmin']]);
    Route::put('{id}/update',       ['as'=>'autores.update',      'uses'=>'AutoresController@update',       'middleware' => ['auth', 'superadmin']]);
    Route::post('store',            ['as'=>'autores.store',       'uses'=>'AutoresController@store',        'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}visualizar',    ['as'=>'autores.visualizar',  'uses'=>'AutoresController@visualizar',   'middleware' => ['auth', 'superadmin']]);
});

Route::group(['prefix'=>'editoras', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'editoras',             'uses'=>'EditorasController@index',]);
    Route::get('create',            ['as'=>'editoras.create',      'uses'=>'EditorasController@create',     'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/destroy',      ['as'=>'editoras.destroy',     'uses'=>'EditorasController@destroy',    'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}/edit',         ['as'=>'editoras.edit',        'uses'=>'EditorasController@edit',       'middleware' => ['auth', 'superadmin']]);
    Route::put('{id}/update',       ['as'=>'editoras.update',      'uses'=>'EditorasController@update',     'middleware' => ['auth', 'superadmin']]);
    Route::post('store',            ['as'=>'editoras.store',       'uses'=>'EditorasController@store',      'middleware' => ['auth', 'superadmin']]);
    Route::get('{id}visualizar',    ['as'=>'editoras.visualizar',  'uses'=>'EditorasController@visualizar', 'middleware' => ['auth', 'superadmin']]);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'users', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                          ['as'=>'users',             'uses'=>'UsersController@index']);
    Route::get('{id}/edit',                 ['as'=>'users.edit',        'uses'=>'UsersController@edit']);
    Route::put('{id}/update',               ['as'=>'users.update',      'uses'=>'UsersController@update']);
});

Route::group(['prefix'=>'emprestimos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('index',                 ['as'=>'emprestimos',                   'uses'=>'EmprestimosController@index',              'middleware' => ['auth', 'admin']]);
    Route::get('create',                ['as'=>'emprestimos.create',            'uses'=>'EmprestimosController@create',             'middleware' => ['auth', 'admin']]);
    Route::get('comprovante',           ['as'=>'emprestimos.comprovante',       'uses'=>'EmprestimosController@comprovante',        'middleware' => ['auth', 'admin']]);
    Route::get('{id}/comprovante2',     ['as'=>'emprestimos.comprovante2',      'uses'=>'EmprestimosController@comprovante2',       'middleware' => ['auth', 'admin']]);
    Route::post('store',                ['as'=>'emprestimos.store',             'uses'=>'EmprestimosController@store',              'middleware' => ['auth', 'admin']]);
});

Route::group(['prefix'=>'configs', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('{id}/edit',         ['as'=>'configs.edit',        'uses'=>'ConfigsController@edit',       'middleware' => ['auth', 'superadmin']]);
    Route::put('{id}/update',       ['as'=>'configs.update',      'uses'=>'ConfigsController@update',     'middleware' => ['auth', 'superadmin']]);
});