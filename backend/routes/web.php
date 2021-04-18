<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/todo', 'App\Http\Controllers\TodoController@index');
Route::post('/todo', 'App\Http\Controllers\TodoController@create');
Route::post('/todo/update', 'App\Http\Controllers\TodoController@update');
Route::post('/todo/delete', 'App\Http\Controllers\TodoController@delete');

Route::get('/article', 'App\Http\Controllers\GetController@read');

Route::get('/article/create', function() {
    return view('new_article');
});

Route::post('/article/create', 'App\Http\Controllers\PostController@create');
Route::get('/article/{id}', 'App\Http\Controllers\GetController@show');

Route::get('/article/edit/{id}', 'App\Http\Controllers\GetController@edit');
Route::post('/article/edit/{id}', 'App\Http\Controllers\PostController@update');

Route::get('/article/destroy/{id}', 'App\Http\Controllers\GetController@destroy');
Route::post('/article/destroy/{id}', 'App\Http\Controllers\PostController@delete');