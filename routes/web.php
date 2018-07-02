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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/blog', 'ArticleController@index');
Route::get('/blog/{post}', 'ArticleController@show');

Route::post('/blog/{post}/comment', 'ArticleController@comment')->middleware('auth');
Route::get('/article/create', 'ArticleController@create')->middleware('auth');
Route::post('/articles', 'ArticleController@store')->middleware('auth');

Route::get('/login', 'SessionController@show')->name('login');
Route::post('/login', 'SessionController@create');

Route::get('/logout', 'SessionController@destroy');

Route::get('/register', 'RegistrationController@show');
Route::post('/register', 'RegistrationController@create');
