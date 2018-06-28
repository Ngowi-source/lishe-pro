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

Route::get('/', 'HomeController@index');

Route::get('/blog', 'ArticleController@index');
Route::get('/blog/{post}', 'ArticleController@show');
Route::post('/blog/{post}/comment', 'ArticleController@comment');
Route::get('/article/create', 'ArticleController@create');
Route::post('/articles', 'ArticleController@store');

Route::get('/login', 'SessionController@show');
Route::get('/register', 'RegistrationController@create');
