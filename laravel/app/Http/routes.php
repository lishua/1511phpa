<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Route::get('/about', 'MyController@getAbout');

// Route::resource('user', 'UserController');
//增删
Route::get('my_home', 'MyController@nicai');

Route::resource('show_do', 'MyController@show_do');

Route::resource('del', 'MyController@del');

Route::post('create', 'MyController@create');

Route::get('edit', 'MyController@edit');

Route::post('update', 'MyController@update');

//定期
Route::resource('login', 'DateController@login');

Route::resource('show', 'DateController@show');

Route::resource('rcadd', 'DateController@rcadd');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
