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

Route::get('movements', 'MovementsController@index');

Route::get('locations', 'LocationsController@index');

Route::get('receive', 'ReceiveController@index');

Route::get('api', 'ProductsController@json');

Route::resource('scan', 'ScanController');
//Route::get('scan', 'ScanController@index');
//Route::resource('project.tasklist.task', 'TaskController');

Route::get('products', 'ProductsController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('start', 'StartController@index');

Route::get('oauth/{provider?}', 'Auth\SocialAuthController@login');

Route::get('/', function () {
    return view('welcome');
});
