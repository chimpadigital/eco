<?php
namespace App\Traits;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\StatusPayment;


trait PaymentMethodTrait {


    public function createPaymentOrUpdate($data, $status = 'created')
    {
        $status = StatusPayment::where('name',$status)->first();

        $data['status_payment_id'] = $status->id;

        Payment::updateOrCreate($data);
    }

    public function getPaymentStatusByInvoice(Invoice $invoice)
    {
        $invoice->load('payments.status');
        
        if( isset($invoice->payment->status->name) ){

            return $invoice->payment->status->name;

        }

        return false;
        
    } 

    public function getInvoice($paymentMethodId,$user = null)
    {
        if(is_null($user)){

            $user = auth()->user();
        }

        $paymentMethod = $this->getPaymentMethod($paymentMethodId);

        return Invoice::where('user_id',$user->id)
        ->latest()
        ->firstOrCreate([
            'total'=>$paymentMethod->details->amount,
            'user_id'=>$user->id,
            'description'=>$paymentMethod->details->description,
        ]);
    }

    public function getPaymentMethod($id){

        return PaymentMethod::with('details')
        ->find($id);
    
    }


}