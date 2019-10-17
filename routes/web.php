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

Route::get('todos','TodosController@index');
Route::get('todos/{todo}','TodosController@show');
Route::get('/search','TodosController@search');
Route::post('/create','TodosController@store');
Route::get('/create','TodosController@create');
Route::get('/todos/{todo}/edit','TodosController@edit');
Route::patch('/todos/{todo}/update','TodosController@update');
Route::delete('/todos/{todo}/delete','TodosController@destroy');
Route::post('/todos/complete/{todo}','TodosController@complete');