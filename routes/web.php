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

Route::get('/', 'BaseController@getIndex' );
Route::get('/book/{id}','BookController@getOne');
Route::get('/catalog/{id}','BookController@getCat');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@postIndex');
Route::get('/{id}', 'PageController@getIndex');

