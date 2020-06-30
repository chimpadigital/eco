<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
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
    
    function paymentPending()
    {
        $user = auth()->user();
        
        if($user->can('verifyPaymentPending',PaymentMethod::class)){
            return view('payments.paymentPending');
        }

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

    public function getDicountCode(Request $request){

        $code = PromoCode::where('state',true)->where('code_name',$request->input('discount_code'))->first();

        return response()->json($code,200);

    }
}
