<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{    
    /**
     * paymentMethodIndex
     *
     * @return void
     */
    public function paymentMethodIndex()
    {
        $paymentsMethods = PaymentMethod::with('details')->get();

        return view('payments.paymentMethodIndex',[
            
            'paymentsMethods'=>$paymentsMethods,
        
        ]);
    }
    
    /**
     * paymentSuccess
     *
     * @return void
     */
    public function paymentSuccess()
    {
        return view('payments.paymentSuccess');
    }
    
    /**
     * paymentCancel
     *
     * @return void
     */
    public function paymentCancel()
    {
        return view('payments.paymentCancel');
    }
}
