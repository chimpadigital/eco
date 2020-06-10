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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('web')->group(function(){
    Route::prefix('users')->group(function(){
        Route::get('/','Admin\UsersController@index');

    });
});


Route::prefix('payments')->group(function(){

    Route::get('/payment-method','PaymentMethodController@paymentMethodIndex');
    
    Route::post('/payment-method/paypal/create/order','PayPalController@createOrder')->name('paypal.create.order');
    Route::post('/payment-method/paypal/capture/order','PayPalController@captureOrder')->name('paypal.capture.order');

    Route::get('/success','PaymentMethodController@paymentSuccess')->name('payment.success');
    Route::get('/cancel','PaymentMethodController@paymentCancel')->name('payment.cancel');
});
