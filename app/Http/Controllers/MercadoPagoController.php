<?php

namespace App\Http\Controllers;

use MercadoPago\SDK;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){

        SDK::setClientId(env("MP_CLIENT_ID"));
        SDK::setClientSecret(env("MP_CLIENT_SECRET"));
    
    }

        
    /**
     * createOrder
     *
     * @return void
     */
    public function createOrder(){

        # Create a preference object
        $preference = new \MercadoPago\Preference();
        # Create an item object
        $item = new \MercadoPago\Item();
        $item->id = '1';
        $item->title = 'Pago fundacion Eco';
        $item->quantity = 1;
        $item->currency_id = "ARS";
        $item->unit_price = '220.00';
        # Create a payer object
        $payer = new \MercadoPago\Payer();
        $payer->email = 'prueba@prueba.com';
        # Setting preference properties
        $preference->items = array($item);
        $preference->payer = $payer;
        $preference->external_reference = '123123';

        $preference->payment_methods = array(
          "installments" => 1
        );
        $preference->auto_return = "all";
        
        $preference->back_urls = array(
            "success" => route('payment.success'),
            "failure" => route('payment.cancel'),
            "pending" => route('payment.cancel'),
        );

        # Save and posting preference
        $preference->save();

        return redirect($preference->sandbox_init_point); //init_point to prod
    }
}
