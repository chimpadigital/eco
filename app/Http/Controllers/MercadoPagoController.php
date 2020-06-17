<?php

namespace App\Http\Controllers;

use MercadoPago\SDK;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

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
    public function createOrder(Request $request){

        $paymentMethod = $this->getPaymethod();

        # Create a preference object
        $preference = new \MercadoPago\Preference();
        # Create an item object
        $item = new \MercadoPago\Item();
        $item->id = '1';
        $item->title = $paymentMethod->details->description;
        $item->quantity = 1;
        $item->currency_id = "USD";
        $item->unit_price = $paymentMethod->details->amount;
        # Create a payer object
        $payer = new \MercadoPago\Payer();
        $payer->email = 'prueba@prueba.com';
        # Setting preference properties
        $preference->items = array($item);
        $preference->payer = $payer;
        $preference->external_reference = $this->generateToken();

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

    
    /**
     * getPaymethod
     *
     * @return void
     */
    public function getPaymethod()
    {
        return PaymentMethod::with('details')->find(2);
    }

    
    /**
     * generateToken
     *
     * @return void
     */
    public function generateToken()
    {
        return md5(rand(1, 10) . microtime());
    }
}
