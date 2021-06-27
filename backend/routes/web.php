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
    return view('layouts/app');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/phpinfo', function() {
    phpinfo();
});

Route::get('/test', function() {
    return view('test');
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

/* ===== item ===== */
Route::get('/item', 'App\Http\Controllers\ItemController@index');

/* ===== Todolist ===== */
Route::get('/todolist', 'App\Http\Controllers\TodolistController@index');
Route::resource('todolist', 'App\Http\Controllers\TodolistController',
    ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ===== Forum ===== */
Route::get('/forum', 'App\Http\Controllers\ForumController@index');
Route::resource('forum', 'App\Http\Controllers\ForumController',
    ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);

/* ===== ForumPost ===== */
Route::get('/forum/post/{id}', 'App\Http\Controllers\ForumPostController@index')->name('forum.post.index');
Route::post('/forum/post/{id}', 'App\Http\Controllers\ForumPostController@update')->name('forum.post.update');
Route::delete('/forum/post/{id}', 'App\Http\Controllers\ForumPostController@destroy')->name('forum.post.destroy');
// Route::resource('forum/post', 'App\Http\Controllers\ForumPostController');