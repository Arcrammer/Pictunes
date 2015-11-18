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

// Desktop and mobile site
Route::group(['domain' => 'pictunes.{tld}'], function () {
  // Get
  Route::get('pictuner', function () {
    // What do they want, exactly? Send them home.
    return redirect('http://pictunes.dev/');
  });
  Route::get('pictuner/{username}', 'DashboardController@user_pictunes');

  // Controllers
  Route::resource('/', 'DashboardController@index');

  // Authentication controllers
  Route::controllers([
    'auth' => '\Pictunes\Http\Controllers\Auth\AuthController',
    'password' => '\Pictunes\Http\Controllers\Auth\PasswordController'
  ]);
});

// API
Route::group([
  'domain' => 'api.pictunes.{tld}',
  'namespace' => 'API'
], function () {
  // Controllers
  Route::resource('pictuner', 'UserController');
  Route::resource('/', 'DashboardController');

  // Get
  Route::get('pictune/image/{imageID}', 'DashboardController@pictuneImage');
  Route::get('pictuner/selfie/{imageID}', 'DashboardController@pictunerImage');

  // Authentication controllers
  Route::controllers([
    'auth' => '\Pictunes\Http\Controllers\API\Auth\AuthController',
    'password' => '\Pictunes\Http\Controllers\API\Auth\PasswordController'
  ]);
});
