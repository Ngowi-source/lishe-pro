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
Route::get('/blog/{title}', 'ArticleController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/blog/{title}/comment', 'ArticleController@comment');
    Route::post('/blog/{title}/reply', 'ArticleController@reply');
    Route::get('/article/create', 'ArticleController@create');
    Route::post('/articles', 'ArticleController@store');
});
Route::get('/login', 'SessionController@show')->name('login');
Route::post('/login', 'SessionController@create');

Route::get('/logout', 'SessionController@destroy');

Route::get('/register', 'RegistrationController@show');
Route::post('/register', 'RegistrationController@create');

Route::get('/reset', function(){
    return view('auth.reset');
});
Route::post('/reset', 'RecoveryController@mailUser');

Route::get('auth/callback/facebook', 'SocialAuthController@callbackfb');
Route::get('auth/redirect/{social}', 'SocialAuthController@redirect');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
