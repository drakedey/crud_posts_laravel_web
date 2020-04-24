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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('posts')->group(function() {
    Route::get('/{id}/detail', 'PostController@detail')->name('post.detail');
    Route::get('/create/{id}', 'PostController@editPost')->name('post.get.edit');
    Route::get('/create', 'PostController@createPost')->name('post.get.create');
    Route::post('/create', 'PostController@storePost')->name('post.post.create');
    Route::put('/edit/{id}', 'PostController@storeEditedPost')->name('post.put.edit');
    Route::delete('/delete', 'PostController@softDelete')->name('post.softdelete');
    Route::get('/read/{id}', 'PostController@read')->name('post.read');
});

Route::prefix('profile')->group(function() {
    Route::get('/posts', 'PostController@index')->name('posts'); 
}) ;

