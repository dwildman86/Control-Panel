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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/billing', function () {
    return view('billing');
});

Route::get('/your-data', function () {
    return view('data');
});
Route::get('/app', function () {
    return view('app');
});

Route::post('/subscribe_process_app', 'CheckoutController@subscribe_process_app');
Route::post('/subscribe_email', 'EmailController@addEmailDomain');
Route::post('/subscribe_dns', 'CheckoutController@subscribe_dns');
//Route::post('/cancel_app', 'CheckoutController@subscribe_cancel_app');
//Route::post('/update_app', 'CheckoutController@subscribe_updatepay_app');


Route::get('/invoices', 'CheckoutController@invoices');
Route::get('/invoice/{invoice_id}', 'CheckoutController@invoice');