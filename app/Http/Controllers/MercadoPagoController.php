<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use MercadoPago\SDK;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Traits\SendEmailsTrait;
use App\Traits\PaymentMethodTrait;

class MercadoPagoController extends Controller
{
    use PaymentMethodTrait,SendEmailsTrait;

    public $paymentMethod;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        \MercadoPago\SDK::setAccessToken(env("ENV_ACCESS_TOKEN"));
        $this->paymentMethod = $this->getPaymentMethod(1);
    
    }
        
    /**
     * createOrder
     *
     * @return void
     */
    public function createOrder(Request $request){

        // SDK::setClientId(env("MP_CLIENT_ID"));
        // SDK::setClientSecret(env("MP_CLIENT_SECRET"));

        $this->authorize('verifyPayment',PaymentMethod::class);

        $paymentMethod = $this->getPaymethod();

        $authUser = auth()->user();

        $promoCodeAmount = 0;
        $promoCodeId = null;

        $promoCode = PromoCode::where('code_name',$request->input('discount_code'))
        ->where('state',true)
        ->where('expiration_date','>=',Carbon::now())
        ->first();

        if($promoCode){
            $promoCodeAmount = $promoCode->amount;
            $promoCodeId = $promoCode->id;
        } 

        # Create a preference object
        $preference = new \MercadoPago\Preference();
        # Create an item object
        $item = new \MercadoPago\Item();
        $item->id = '1';
        $item->title = $paymentMethod->details->description;
        $item->quantity = 1;
        $item->currency_id = "USD";
        $item->unit_price = $paymentMethod->details->amount - $promoCodeAmount;
        # Create a payer object
        $payer = new \MercadoPago\Payer();
        $payer->email = $authUser->email;
        $payer->first_name = $authUser->name;
        $payer->last_name = $authUser->lastname;
        # Setting preference properties
        $preference->items = array($item);
        $preference->payer = $payer;
        $preference->external_reference = $this->generateToken($authUser->id,$promoCodeId);

        $preference->payment_methods = array(
          "installments" => 1
        );
        $preference->auto_return = "all";
        
        //$preference->notification_url = "https://b798efe5e033.ngrok.io/mp/notification/webhook";
        $preference->notification_url = route('notification.mp');

        $preference->back_urls = array(
            "success" => route('payment.success'),
            "failure" => route('payment.cancel'),
            "pending" => route('payment.pending'),
        );

        # Save and posting preference
        $preference->save();

        return redirect($preference->init_point); //init_point to prod
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

    


    public function webhook(Request $request)
	{


		$merchant_order = null;

		if($request->input('type') == "payment") {

			
			$paymentNotification = \MercadoPago\Payment::find_by_id($request->input('data.id'));
			
			$order_id = $paymentNotification->order->id;
			
			$merchant_order = \MercadoPago\MerchantOrder::find_by_id($order_id);

            $paid_amount = 0;
            
            $data_json = base64_decode($merchant_order->external_reference);
            $data = json_decode($data_json);
            
            if(!$user = User::find($data->user_id)){
                return \Response::json('forbidden',403);
            }

            $promoCode = PromoCode::find($data->code_discount_id);
            
            $promoCodeAmount = 0;
            
            if($promoCode){
            
                $promoCodeAmount = $promoCode->amount;
            
                $promoCode->update([
                    'quantity_applied'=> ++$promoCode->quantity_applied,
                ]);

            }

            /*
            Coemntar la linea de asignacion y descomentar el foreach antes de ir a produccion
            */

            $payment = $paymentNotification; 
		    //foreach ($merchant_order->payments as $payment) {
                
                if ($payment->status == 'approved'){
		            $paid_amount += $payment->transaction_amount;
                
                } else if ($payment->status == 'pending' || $payment->status == 'in_process') {

                    $invoice = $this->getInvoice($this->paymentMethod->id,$user,$promoCodeAmount);

                    $data = $this->buildDataForPayment($invoice,$merchant_order,$promoCode);

                    $this->createPaymentOrUpdate($data,'pending');  

                } else {
                    
                    $invoices = Invoice::where('user_id',$user->id)->get();

                    foreach($invoices as $item){

                        Payment::where('invoice_id',$item->id)->delete();

                        $item->delte();
                    
                    }

                }
            //}
		    // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items


		    if($paid_amount >= $merchant_order->total_amount && $merchant_order->external_reference != null){

                    $invoice = $this->getInvoice($this->paymentMethod->id,$user,$promoCodeAmount);

                    $data = $this->buildDataForPayment($invoice,$merchant_order,$promoCode);

                    $this->createPaymentOrUpdate($data,'approved');  

                    // Correos

                    $this->successPayment($user->email);


		    } else {

		        print_r("Not paid yet. Do not release your item.");
		    }

            

            header("HTTP/1.1 201 OK");
            return \Response::json(['HTTP/1.1 201 OK'], 201);
                

        }
    }

    public function buildDataForPayment($invoice,$merchant_order,$promoCode = null){

        return [
            'invoice_id'=>$invoice->id,
            'payment_id'=>null,
            'order_id'=>$merchant_order->id,
            'payment_method_id'=>$this->paymentMethod->id,
            'external_reference'=>$merchant_order->external_reference,
            'promo_code_id'=>isset($promoCode->id) ? $promoCode->id : null,
        ];

    }

}