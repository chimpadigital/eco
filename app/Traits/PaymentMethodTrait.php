<?php
namespace App\Traits;

use App\Models\Invoice;
use App\Models\Payment;


trait PaymentMethodTrait {

    public function createInvoice($user,$paymentMethod)
    {
        return Invoice::create([
            'total'=>$paymentMethod->details->amount,
            'user_id'=>$user->id,
        ]);
    }

    public function createPayment($invoice)
    {
        Payment::create([
            'invoice_id'=>$invoice->id,
            'status_id'=>$status->id,
        ]);
    }


}