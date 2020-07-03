<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Payment;
use Sample\PayPalClient;
use App\Models\PromoCode;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\WebhookEvent;
use App\Models\PaymentMethod;
use App\Traits\SendEmailsTrait;
use App\Traits\PaymentMethodTrait;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\VerifyWebhookSignature;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalController extends Controller
{
    use PaymentMethodTrait,SendEmailsTrait;

    public $paymentMethod;

    public $promoCodeAmount;
    
    public $promoCodeId;
    
    public $userAuth;

    public $apiContext;



    public function __construct(){

        $this->paymentMethod = $this->getPaymentMethod(2);

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('CLIENT_ID'), 
                env('SECRET_ID')
            )
        );

        $this->apiContext->setConfig(
            array(
              'mode' => env('PAYPAL_ENVIROMENT'),
            )
        );

    }

    public function createOrder(Request $request,$debug=false)
    {
        $this->authorize('verifyPayment',PaymentMethod::class);
        
        $this->userAuth = auth()->user();
        
        $requestPaypal = new OrdersCreateRequest();

        $this->promoCodeAmount = 0;
        $this->promoCodeId = null;

        $promoCode = PromoCode::where('code_name',$request->input('discount_code'))
        ->where('state',true)
        ->where('expiration_date','>=',Carbon::now())
        ->first();

        if($promoCode){
            $this->promoCodeAmount = $promoCode->amount;
            $this->promoCodeId = $promoCode->id;
        } 
       
        $requestPaypal->prefer('return=representation');
       
        $requestPaypal->body = $this->buildRequestBody();
       
        // 3. Call PayPal to set up a transaction
       
        $client = PayPalClient::client();
       
        $response = $client->execute($requestPaypal);
       
        if ($debug)
        {
       
            print "Status Code: {$response->statusCode}\n";
       
            print "Status: {$response->result->status}\n";
       
            print "Order ID: {$response->result->id}\n";
       
            print "Intent: {$response->result->intent}\n";
       
            print "Links:\n";
       
            foreach($response->result->links as $link)
       
            {
       
                print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
       
            }

        
            // To print the whole response body, uncomment the following line
        
            // echo json_encode($response->result, JSON_PRETTY_PRINT);
        
        }

        // 4. Return a successful response to the client.
        return \Response::json($response->result,200);
    }

    private function buildRequestBody()
    {
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => route('payment.success'),
                    'cancel_url' => route('payment.cancel')
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'reference_id'=>$this->generateToken($this->userAuth->id,$this->promoCodeId),
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => $this->paymentMethod->details->amount - $this->promoCodeAmount,
                                    'breakdown' => 
                                        array(
                                            'item_total' =>
                                                array(
                                                    'currency_code' => 'USD',
                                                    'value' => $this->paymentMethod->details->amount - $this->promoCodeAmount,
                                                ),
                                        ),
                                ),
                            'items' =>
                            	array(
                                    array(
                                    'name' => 'Fundacion Eco',
                                    'description' => $this->paymentMethod->details->description,
                                    'unit_amount' =>
                                        array(
                                        'currency_code' => 'USD',
                                        'value' => $this->paymentMethod->details->amount - $this->promoCodeAmount,
                                        ),
                                    'quantity' => '1',
                                    )
                            	),
                        )
                )
        );
    }


    /**
     *This function can be used to capture an order payment by passing the approved
    *order ID as argument.
    *
    *@param orderId
    *@param debug
    *@returns
    */
    public function captureOrder(Request $request, $debug=false)
    {
        $this->authorize('verifyPayment',PaymentMethod::class);
    
        $requestPaypal = new OrdersCaptureRequest($request->json('orderID'));

        $client = PayPalClient::client();
        $response = $client->execute($requestPaypal);

        if ($debug)
        {
        print "Status Code: {$response->statusCode}\n";
        print "Status: {$response->result->status}\n";
        print "Order ID: {$response->result->id}\n";
        print "Links:\n";
        foreach($response->result->links as $link)
        {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
        }
        print "Capture Ids:\n";
        foreach($response->result->purchase_units as $purchase_unit)
        {
            foreach($purchase_unit->payments->captures as $capture)
            {   
            print "\t{$capture->id}";
            }
        }
        // To print the whole response body, uncomment the following line
        // echo json_encode($response->result, JSON_PRETTY_PRINT);
        }
        $reference_id = $response->result->purchase_units[0]->reference_id;
        $data_json = base64_decode($reference_id);
        $data = json_decode($data_json);

        $promoCode = PromoCode::find($data->code_discount_id);
        
        $promoCodeAmount = 0;

        if($promoCode){

            $promoCodeAmount = $promoCode->amount;

            $promoCode->update([
                'quantity_applied'=> ++$promoCode->quantity_applied,
            ]);

        }

        if($response->result->status == 'COMPLETED' || $response->result->status == 'PENDING'){

            if($response->result->status == 'COMPLETED'){
                
                $status = 'approved';
            
            }else{

                $status = 'pending';

            }

            $invoice = $this->getInvoice($this->paymentMethod->id,null,$promoCodeAmount);

            $captures = $response->result->purchase_units[0]->payments->captures;

            foreach($captures as $capture){

                $data = [
                    'invoice_id'=>$invoice->id,
                    'payment_id'=>$capture->id,
                    'order_id'=>$response->result->id,
                    'payment_method_id'=>$this->paymentMethod->id,
                    'promo_code_id'=>isset($promoCode->id) ? $promoCode->id : null,
                ];

                $this->createPaymentOrUpdate($data,$status);
            
            }

            if($status == "approved"){
                $this->successPayment(auth()->user()->email);
            }

        }


        return \Response::json($response,200);
    }




    public function webhook()
    {
        /**
        * Receive the entire body that you received from PayPal webhook.
        */
        $bodyReceived = file_get_contents('php://input');

        /**
        * Receive HTTP headers that you received from PayPal webhook.
        */
        $headers = getallheaders();

        /**
        * Uppercase all the headers for consistency
        */
        $headers = array_change_key_case($headers, CASE_UPPER);

        $signatureVerification = new VerifyWebhookSignature();
        $signatureVerification->setWebhookId(env('WEBHOOK_ID'));
        $signatureVerification->setAuthAlgo($headers['PAYPAL-AUTH-ALGO']);
        $signatureVerification->setTransmissionId($headers['PAYPAL-TRANSMISSION-ID']);
        $signatureVerification->setCertUrl($headers['PAYPAL-CERT-URL']);
        $signatureVerification->setTransmissionSig($headers['PAYPAL-TRANSMISSION-SIG']);
        $signatureVerification->setTransmissionTime($headers['PAYPAL-TRANSMISSION-TIME']);

        $webhookEvent = new WebhookEvent();
        $webhookEvent->fromJson($bodyReceived);
        $signatureVerification->setWebhookEvent($webhookEvent);
        $request = clone $signatureVerification;

        try {
            /** @var \PayPal\Api\VerifyWebhookSignatureResponse $output */
            $output = $signatureVerification->post($this->apiContext);
            $this->changeStatusPayment($output,$request);

            return \Response::json("",200);

        } catch (\Exception $ex) {
            print_r($ex->getMessage());
            exit(1);
        }
    }

    public function changeStatusPayment($output,$request)
    {
        $verificationStatus = $output->getVerificationStatus();
        $responseArray = json_decode($request->toJSON(), true);

        $event = $responseArray['webhook_event']['event_type'];

        $outputArray = json_decode($output->toJSON(), true);

        if ($verificationStatus == 'SUCCESS') {
            switch($event) {
                case 'PAYMENT.CAPTURE.CANCELLED':
                case 'PAYMENT.CAPTURE.DENIED':
                // subscription canceled: agreement id = $responseArray['webhook_event']['resource']['id']

                    $payment = Payment::where('payment_id',$responseArray['webhook_event']['resource']['id'])->first();
                     
                    if($payment){
                        $invoiceID = $payment->invoice_id;

                        $payment->delete();
                        
                        Invoice::find($invoiceID)->delete();
                    }

                break;
                case 'PAYMENT.CAPTURE.COMPLETED':

                    $payment = Payment::where('payment_id',$responseArray['webhook_event']['resource']['id'])->first();
                    
                    if($payment){
                        $payment->update([
                            'status_payment_id'=>1,
                        ]);
                        
                        $invoice = Invoice::find($payment->invoice_id);

                        $user = User::find($invoice->user_id);

                        $this->successPayment($user->email);
                    }

                //subscription payment recieved: agreement id = $responseArray['webhook_event']['resource']['billing_agreement_id']
                    break;
                case 'PAYMENT.CAPTURE.PENDING':

                    $payment = Payment::where('payment_id',$responseArray['webhook_event']['resource']['id'])->first();
                    
                    if($payment){
                        $payment->update([
                            'status_payment_id'=>3,
                        ]);
                        
                    }

                //subscription payment recieved: agreement id = $responseArray['webhook_event']['resource']['billing_agreement_id']
                break;
                
            }
        }
    }












}
