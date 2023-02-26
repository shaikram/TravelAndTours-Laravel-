<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ================ mainController ======================== //
Route::get('/', 'App\Http\Controllers\mainController@index');
Route::get('/admin', 'App\Http\Controllers\mainController@admin');
Route::get('/login', 'App\Http\Controllers\mainController@login');
Route::get('/admin-list', 'App\Http\Controllers\mainController@adminList');
Route::get('/product-list', 'App\Http\Controllers\mainController@productList');
// ================ end of mainController ================== //


// ================ UserController ======================== //
Route::get('/get-admin-list', 'App\Http\Controllers\UserController@index');
Route::post('/store-admin', 'App\Http\Controllers\UserController@store');
Route::put('/delete-admin/{id}', 'App\Http\Controllers\UserController@delete');
Route::put('/activate-admin/{id}', 'App\Http\Controllers\UserController@activate');
Route::put('/deactivate-admin/{id}', 'App\Http\Controllers\UserController@deactivate');
// ================ end of UserController ================== //

// ================ DestinationController ======================== //
Route::get('/get-product-list', 'App\Http\Controllers\DestinationController@index');
Route::post('/store-product', 'App\Http\Controllers\DestinationController@store');
Route::post('/upload-product', 'App\Http\Controllers\DestinationController@upload_product');
Route::put('/delete-product/{id}', 'App\Http\Controllers\DestinationController@delete');
Route::get('/show-product/{id}', 'App\Http\Controllers\DestinationController@show');
// ================ end of DestinationController ================== //

// ================ PackagesController ======================== //
Route::get('/get-package-list', 'App\Http\Controllers\PackagesController@index');
Route::post('/store-package', 'App\Http\Controllers\PackagesController@store');
// ================ end of PackagesController ================== //

// ================ mainController ======================== //
Route::get('/booking', 'App\Http\Controllers\BookingController@index');
// ================ end of mainController ================== //

