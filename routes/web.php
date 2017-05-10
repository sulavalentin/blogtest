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

Route::get('/login','RegisterController@getlogin');
Route::post('/login','RegisterController@postlogin');
Route::get('/register','RegisterController@getregister');
Route::post('/register','RegisterController@postregister');
Route::get('/logout','RegisterController@logout');

Route::get('/verify/{email}-{token}','RegisterController@verify');

Route::get('/admin','Admin\AdminController@admin');