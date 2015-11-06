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

// Desktop and mobile authentication
Route::group(['domain' => 'pictunes.{tld}'], function () {
  // Desktop and mobile site controllers
  Route::resource('user', 'UserController');
  Route::resource('/', 'DashboardController');
  Route::controllers([
    'auth' => '\Pictunes\Http\Controllers\Auth\AuthController',
    'password' => '\Pictunes\Http\Controllers\Auth\PasswordController'
  ]);
});

// API controllers
Route::group([
  'domain' => 'api.pictunes.{tld}',
  'namespace' => 'API'
], function () {
  Route::resource('user', 'UserController');
  Route::resource('/', 'DashboardController');
  Route::controllers([
    'auth' => '\Pictunes\Http\Controllers\API\Auth\AuthController',
    'password' => '\Pictunes\Http\Controllers\API\Auth\PasswordController'
  ]);
  Route::get('pictune/image/{imageID}', 'DashboardController@image');
});
