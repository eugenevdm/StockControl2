<?php

/**
 * Use singular when creating controllers
 */

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

Route::resource('category', 'CategoryController');

Route::resource('supplier', 'SupplierController');

Route::resource('inventory', 'InventoryController');

Route::get('home', 'MovementsController@index');

Route::get('movements', 'MovementsController@index');

//Route::get('location', 'LocationsController@index');

Route::get('add', 'AddController@index');
Route::get('remove', 'RemoveController@index');

Route::resource('stockin', 'StockInController');
Route::resource('stockout', 'StockOutController');
Route::resource('location', 'LocationsController');

Route::get('api', 'ProductsController@json');

Route::get('products', 'ProductsController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('start', 'StartController@index');

Route::get('oauth/{provider?}', 'Auth\SocialAuthController@login');

Route::get('/', 'WelcomeController@index');

//Route::get('/', function () {
//    return view('welcome');
//});
