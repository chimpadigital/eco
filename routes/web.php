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



Route::get('/', 'SiteController@index')->name("/");
Route::get('/emails', 'SiteController@emails');

Route::view('terminos','term')->name('terms');
Route::view('condiciones','condition')->name('condition');
Route::view('politicas','policies')->name('policies');

Auth::routes();

Route::get('register', function(){
    return redirect()->route('/');
})->name("register");

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/home', 'HomeController@index')->name('home');
//Rutas Admin
Route::prefix('admin')->group(function(){
    Route::get('auth','Admin\AuthController@auth');
    Route::get('/login','Admin\AuthController@showAdminLoginForm');
    Route::post('/login','Admin\AuthController@adminLogin')->name('admin.post.login');
    Route::post('logout','Admin\AuthController@logout')->name('admin.post.logout');
    
});
Route::prefix('admin')->middleware('auth:admin','role:Administrator')->group(function(){
    
    Route::get('/','Admin\AdminDashController@index')->name('admin.index.home');
    //Rutas Users
    Route::prefix('users')->group(function(){
        Route::get('/','Admin\UsersController@index')->name('admin.index.users');
        Route::post('/list-users','Admin\UsersController@listUsers');
        Route::post('/delete-user','Admin\UsersController@DeleteUser');
        Route::prefix('perfil')->group(function(){
            Route::get('/','Admin\UsersController@perfil')->name('admin.perfil');
            Route::post('/','Admin\UsersController@inforPerfil')->name('admin.pedir.perfil');
            Route::post('/update','Admin\UsersController@updateInforPerfil');
            Route::post('/countries','Admin\UsersController@countries');
            
        });

    });
    //Rutas PromoCode
    Route::prefix('promo')->group(function(){
        Route::get('/','Admin\PromoCodeController@index')->name('admin.index.promo');
        Route::post('/','Admin\PromoCodeController@listado')->name('admin.promo');
        Route::post('/store','Admin\PromoCodeController@store')->name('admin.promo.store');
        Route::post('/delete','Admin\PromoCodeController@delete')->name('admin.promo.delete');
    });

});

Route::group(['middleware' => ['role:User','auth']],function(){

    Route::get('steps','StepsController@stepRouter')->name('steps');

    Route::prefix('payments')->group(function(){

        Route::get('/payment-method','PaymentMethodController@paymentMethodIndex')->name('payment.methods');
        
        Route::post('/dicount-code','PaymentMethodController@getDicountCode')->name('get.promo.code');
        // Rutas PayPal
        Route::post('/payment-method/paypal/create/order','PayPalController@createOrder')->name('paypal.create.order');
        Route::post('/payment-method/paypal/capture/order','PayPalController@captureOrder')->name('paypal.capture.order');
    
        // Rutas MercadoPago
    
        Route::get('/payment-method/mercado-pago/create/order','MercadoPagoController@createOrder')->name('mercado.pago.create.order');
        Route::get('/payment-method/mercado-pago/capture/order','MercadoPagoController@captureOrder')->name('mercado.pago.capture.order');
    
    
        Route::get('/success','PaymentMethodController@paymentSuccess')->name('payment.success');
        Route::get('/pending','PaymentMethodController@paymentPending')->name('payment.pending');
        Route::get('/cancel','PaymentMethodController@paymentCancel')->name('payment.cancel');

    });

      // Rutas de formulario de inscripcion

      Route::post('inscription-form','RegistrationFormController@store')->name('inscription.form');

      //Rutas de descarga

      Route::post('descarcar/{id}/contenido','DownloadControlController@download')->name('download.content');
      Route::post('descarcar/{id}/notificar','DownloadControlController@notification')->name('download.notification');
      

    //Rutas de Citar
    Route::prefix('quotes')->group(function(){
        Route::get('/','QuoteController@index')->name('quotes');
        Route::post('/consulta-fecha','QuoteController@consultarFecha');
        Route::post('/reservar-fecha','QuoteController@reservarFecha');
        Route::post('check-sessions','QuoteController@checkSession');
    });
    Route::get('finalizar','FinalizarController@index');


    //Verificar paso actual
    Route::post('verificar/{id}/step','StepsController@verifyStep')->name('step.verify');
    
    //Encuesta

    Route::get('survey','SurveyController@create')->name('survey.create');
    Route::post('survey','SurveyController@store')->name('survey.store');
      

});

Route::post('/mp/notification/webhook', 'MercadoPagoController@webhook')->name('notification.mp');
Route::post('/paypal/notification/webhook', 'PayPalController@webhook')->name('notification.paypal');

Route::get('test',function(){

    dd(\Storage::size('manual.pdf'));

});