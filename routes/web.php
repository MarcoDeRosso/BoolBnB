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
Auth::routes();

// Route::resource('/', 'HomeController');
Route::resource('apartments', 'BackOfficeController');
// Route::resource('messages', 'MessageController');
Route::get('messages','MessageController@index')->name('messages.index');
Route::post('messages','MessageController@store')->name('messages.store');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{id}', 'HomeController@show')->name('apartmentShow');

