<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('user/{uid}', 'Api\UserController@show');

Route::middleware('auth:api')->get('users', 'Api\UserController@index');

Route::middleware('auth:api')->delete('user/{uid}', 'Api\UserController@delete');

Route::post('login', 'Api\AuthController@login');

Route::post('register', 'Api\AuthController@register');