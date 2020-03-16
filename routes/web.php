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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts/create', function () {
    return view('posts.create');
})->middleware('auth');

Route::post('/posts', 'PostsController@store')->middleware('auth');
Route::get('/posts/{post}', 'PostsController@show')->middleware('auth');
Route::delete('/posts/{post}' , 'PostsController@destroy' )->middleware('auth');
Route::get('/posts', 'PostsController@index')->middleware('auth');
Route::get('/posts/{post}/edit' , 'PostsController@edit' )->middleware('auth');
Route::put('/posts/{post}' , 'PostsController@update' )->middleware('auth');




Route::get('/links/create', function () {
    return view('links.create');
})->middleware('auth');

Route::post('/links', 'LinksController@store')->middleware('auth');
Route::get('/links/{link}', 'LinksController@show')->middleware('auth');
Route::delete('/links/{link}' , 'LinksController@destroy' )->middleware('auth');
Route::get('/links', 'LinksController@index')->middleware('auth');
Route::get('/links/{link}/edit' , 'LinksController@edit' )->middleware('auth');
Route::put('/links/{link}' , 'LinksController@update' )->middleware('auth');