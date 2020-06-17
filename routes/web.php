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
//Rutas Admin
Route::prefix('admin')->middleware('web')->group(function(){
    //Rutas Users
    Route::prefix('users')->group(function(){
        Route::get('/','Admin\UsersController@index');
        Route::post('/list-users','Admin\UsersController@listUsers');
        Route::prefix('perfil')->group(function(){
            Route::get('/','Admin\UsersController@perfil')->name('admin.perfil');
            Route::post('/','Admin\UsersController@inforPerfil')->name('admin.pedir.perfil');
            Route::post('/update','Admin\UsersController@updateInforPerfil');
        });

    });
    //Rutas PromoCode
    Route::prefix('promo')->group(function(){
        Route::get('/','Admin\PromoCodeController@index');
        Route::post('/','Admin\PromoCodeController@listado')->name('admin.promo');
        Route::post('/store','Admin\PromoCodeController@store')->name('admin.promo.store');
        Route::post('/delete','Admin\PromoCodeController@delete')->name('admin.promo.delete');
    });

});

Route::group(['middleware' => ['role:User','auth']],function(){

    Route::get('steps','StepsController@stepRouter')->name('steps');

    Route::prefix('payments')->group(function(){

        Route::get('/payment-method','PaymentMethodController@paymentMethodIndex')->name('payment.methods');
        
        // Rutas PayPal
        Route::post('/payment-method/paypal/create/order','PayPalController@createOrder')->name('paypal.create.order');
        Route::post('/payment-method/paypal/capture/order','PayPalController@captureOrder')->name('paypal.capture.order');
    
        // Rutas MercadoPago
    
        Route::get('/payment-method/mercado-pago/create/order','MercadoPagoController@createOrder')->name('mercado.pago.create.order');
        Route::get('/payment-method/mercado-pago/capture/order','MercadoPagoController@captureOrder')->name('mercado.pago.capture.order');
    
    
        Route::get('/success','PaymentMethodController@paymentSuccess')->name('payment.success');
        Route::get('/cancel','PaymentMethodController@paymentCancel')->name('payment.cancel');
    });

});
