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
        $user = auth()->user();
        
        if($user->can('verifyPayment',PaymentMethod::class))
        {
            $paymentsMethods = PaymentMethod::with('details')->get();

            return view('payments.paymentMethodIndex',[
                
                'paymentsMethods'=>$paymentsMethods,
            
            ]);
        } else {

            return redirect()->route('steps');

        }
    }
    
    /**
     * paymentSuccess
     *
     * @return void
     */
    public function paymentSuccess()
    {
        return redirect()->route('steps');
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
