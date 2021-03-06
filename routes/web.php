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
Route::group(['middleware' => ['controladmin']], function () {
    
    /*Admin routes*/
    Route::get('/admin','Admin\AdminController@admin');
    /*posts admin*/
    Route::get('/admin/newpost','Admin\PostsController@newpost');
    Route::post('/admin/addpost','Admin\PostsController@addpost');
    Route::get('/admin/edit/{id}','Admin\PostsController@getedit');
    Route::post('/admin/edit','Admin\PostsController@postedit');
    Route::get('/admin/delete/{id}','Admin\PostsController@getdelete');
    Route::post('/admin/delete/{id}','Admin\PostsController@postdelete');
    /*commnets*/
    Route::get('/admin/comments','Admin\CommentsController@getcomments');
    Route::post('/admin/acceptcomment/{id}','Admin\CommentsController@acceptcomment');
    Route::post('/admin/refusecomment/{id}','Admin\CommentsController@refusecomment');
    Route::get('/admin/deletecomment/{id}','Admin\CommentsController@getdeletecomment');
    Route::post('/admin/deletecomment/{id}','Admin\CommentsController@postdeletecomment');
    /*Add comment*/
    Route::post('addcomment','HomeController@addcomment');
    /*Users routes*/
    Route::get('/admin/users','Admin\UsersController@getusers');
    Route::post('/admin/upadmin/{id}','Admin\UsersController@upadmin');
    Route::post('/admin/downadmin/{id}','Admin\UsersController@downadmin');
    //
});