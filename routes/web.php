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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'livros', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',                  ['as'=>'livros',             'uses'=>'LivrosController@index']);
    Route::get('create',            ['as'=>'livros.create',      'uses'=>'LivrosController@create']);
    Route::get('{id}/destroy',      ['as'=>'livros.destroy',     'uses'=>'LivrosController@destroy']);
    Route::get('{id}/edit',         ['as'=>'livros.edit',        'uses'=>'LivrosController@edit']);
    Route::put('{id}/update',       ['as'=>'livros.update',      'uses'=>'LivrosController@update']);
    Route::post('store',            ['as'=>'livros.store',       'uses'=>'LivrosController@store']);
    Route::get('{id}visualizar',    ['as'=>'livros.visualizar',  'uses'=>'LivrosController@visualizar']);
});
