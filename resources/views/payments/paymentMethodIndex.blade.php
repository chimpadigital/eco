@extends('layouts.site')

@section('content')
 
  <div class="container">
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 shadow-sm">
       
      </div>
      <div class="card mb-4 shadow-sm">
        
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Enterprise</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
          
          <div class="form-check">
              <input class="form-check-input paymentMethod" type="radio" name="paymentMethod" id="exampleRadios1" value="mercadoPago" checked>
              <label class="form-check-label" for="exampleRadios1">
               Mercado Pago
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input paymentMethod" type="radio" name="paymentMethod" id="paypal-method" value="paypal">
              <label class="form-check-label" for="exampleRadios2">
                Paypal
              </label>
          </div>
          
          <ul class="list-unstyled mt-3 mb-4">
            
            <li>15 GB of storage</li>
            <li>Phone and email support</li>
            <li>Help center access</li>
          </ul>
          <button type="button" id="btn-payment" class="btn btn-lg btn-block btn-primary">Pagar</button>
          <div id="paypal-button-container" style="display: none;"></div>
        </div>
      </div>
    </div>
  
    
  </div>
@endsection

@section('scripts')

<script
src="https://www.paypal.com/sdk/js?client-id={{ env('CLIENT_ID') }}"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    var urlCreateOrder = "{{ route('paypal.create.order') }}";
    var urlCaptureOrder = "{{ route('paypal.capture.order') }}";
    

</script>
<script src="{{ asset('js/paymentMethod.js') }}"></script>

    
@endsection
