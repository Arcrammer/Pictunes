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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
  'domain' => 'api.pictunes.dev',
  'namespace' => 'API'
], function () {
  Route::resource('user', 'UserController');
  Route::resource('dashboard', 'DashboardController');
});

Route::resource('user', 'UserController');
Route::resource('dashboard', 'DashboardController');

Route::controllers([
  'auth' => '\Pictunes\Http\Controllers\Auth\AuthController',
  'password' => '\Pictunes\Http\Controllers\Auth\PasswordController'
]);
