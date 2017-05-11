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
/*Home routes*/
Route::get('/', 'HomeController@home');
/*For post route*/
Route::get('/post/{id}', 'HomeController@post');
/*Login and register routes*/
Route::get('/login','RegisterController@getlogin');
Route::post('/login','RegisterController@postlogin');
Route::get('/register','RegisterController@getregister');
Route::post('/register','RegisterController@postregister');
Route::get('/logout','RegisterController@logout');

Route::get('/verify/{email}-{token}','RegisterController@verify');
/*Admin routes*/
Route::get('/admin','Admin\AdminController@admin');
/*posts admin*/
Route::get('/admin/newpost','Admin\PostsController@newpost');
Route::post('/admin/addpost','Admin\PostsController@addpost');
Route::get('/admin/edit/{id}','Admin\PostsController@getedit');
Route::post('/admin/edit','Admin\PostsController@postedit');
Route::get('/admin/delete/{id}','Admin\PostsController@getdelete');
Route::post('/admin/delete/{id}','Admin\PostsController@postdelete');