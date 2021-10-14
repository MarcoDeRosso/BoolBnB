<?php

use App\Http\Controllers\BackOfficeController;
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
Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::resource('apartments', 'BackOfficeController');
Route::get('/apartments/{id}/sponsor', 'BackOfficeController@toSponsor')->name('sponsor');

Route::post('/apartments/{id}/sponsor', 'PaymentsController@store')->name('sponsor.store');

Route::get('/messages','MessageController@index')->name('messages.index');
Route::post('/messages','MessageController@store')->name('messages.store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show')->name('apartmentShow');

Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');
// Route::get('/createCustomer', 'PaymentsController@createCustomer');
// Route::get('/saveCard', 'PaymentsController@saveCard');
// Route::get('/getSavedCard', 'PaymentsController@getSavedCard');
// Route::get('/getPaymentToken', 'PaymentsController@getPaymentToken');
// Route::get('/deleteCard', 'PaymentsController@deleteCard');




