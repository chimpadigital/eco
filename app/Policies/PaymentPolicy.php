<?php

namespace App\Policies;

use App\User;
use App\Models\Invoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function verifyPayment(){
        
        $user = auth()->user();

        $invoice = Invoice::with('payment.status_payment')
        ->where('user_id',$user->id)
        ->latest()
        ->first();

        if( isset($invoice->payment->status_payment->name) ){

            if($invoice->payment->status_payment->name == "approved" OR $invoice->payment->status_payment->name == "pending"){
            
                return false;
            
            }

        }

        return true;

    }
}
