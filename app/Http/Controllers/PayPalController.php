<?php

namespace App\Http\Controllers;

use Sample\PayPalClient;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Traits\PaymentMethodTrait;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalController extends Controller
{
    use PaymentMethodTrait;

    public $paymentMethod;

    public function __construct(){

        $this->paymentMethod = $this->getPaymentMethod(2);

    }

    public function createOrder($debug=false)
    {
        $this->authorize('verifyPayment',PaymentMethod::class);
           
        $request = new OrdersCreateRequest();
       
        $request->prefer('return=representation');
       
        $request->body = $this->buildRequestBody();
       
        // 3. Call PayPal to set up a transaction
       
        $client = PayPalClient::client();
       
        $response = $client->execute($request);
       
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
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => $this->paymentMethod->details->amount,
                                    'breakdown' => 
                                        array(
                                            'item_total' =>
                                                array(
                                                    'currency_code' => 'USD',
                                                    'value' => $this->paymentMethod->details->amount,
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
                                        'value' => $this->paymentMethod->details->amount,
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

    if($response->result->status == 'COMPLETED' || $response->result->status == 'PENDING'){

        if($response->result->status == 'COMPLETED'){
            
            $status = 'approved';
        
        }else{

            $status = 'pending';

        }

        $invoice = $this->getInvoice($this->paymentMethod->id);

        $captures = $response->result->purchase_units[0]->payments->captures;

        foreach($captures as $capture){

            $data = [
                'invoice_id'=>$invoice->id,
                'payment_id'=>$capture->id,
                'order_id'=>$response->result->id,
                'payment_method_id'=>$this->paymentMethod->id,
            ];

            $this->createPaymentOrUpdate($data,$status);
        
        }

    }


    return \Response::json($response,200);
  }
}
