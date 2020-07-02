@extends('layouts.site')

@section('content')

@include('steps.step_bar')
<section id="pago-manual">

<div class="container">
  <div class="row">
      <div class="col-md-6 align-self-center medium d-none d-md-block">
          <div class="manual-text mt-5">
              <div class="icon-manual"><img src="{{ asset('site_assets/img/education.svg') }}" alt="icon manual"></div>
              <h2>@lang('payment.title_1')</h2>
              <p>@lang('payment.p_1')</p>
          </div>
      </div>
      <div class="col-md-6 d-md-none center-text">
         <h2 class="">@lang('payment.title_1')</h2>
      </div>
      <div class="col-md-6 d-flex flex-row-reverse">
          <div class="box-pay">
              <div class="back"></div>
              <div class="icon-business">
                  <img src="{{ asset('site_assets/img/icon-business.svg') }}" alt="">
              </div>
              <h3>@lang('payment.form.title_1')</h3>
              <div class="content-pay">
                  <p>@lang('payment.form.investment')</p>
                  <p id="amount_payment1">150 U$D</p>
              </div>
              
              <form action="{{ route('mercado.pago.create.order') }}" method="GET">
                  @csrf
                  <p>@lang('payment.form.payment_method')</p>
                  <div class="form-check">
                      <input class="form-check-input paymentMethod" type="radio" name="paymentMethod" id="exampleRadios1" value="mercadoPago" checked>
                      <label class="form-check-label" for="exampleRadios1">
                          MercadoPago
                      </label>
                      <img src="{{ asset('site_assets/img/icon-awesome-info-circle.svg') }}" class="btn-tooltip" data-toggle="tooltip" data-placement="top"  data-html="true" title="@lang('payment.form.tooltip_mp')">

                  </div>
                  <div class="form-check">
                      <input class="form-check-input paymentMethod" type="radio" name="paymentMethod" id="paypal-method" value="paypal">
                      <label class="form-check-label" for="exampleRadios2">
                          PayPal
                      </label>
                      <img src="{{ asset('site_assets/img/icon-awesome-info-circle.svg') }}" class="btn-tooltip" data-toggle="tooltip" data-placement="top"  data-html="true" title="@lang('payment.form.tooltip_pp')">
                      
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control input-custom" id="discount_code" aria-describedby="emailHelp" placeholder="@lang('payment.form.promo_code')" name="discount_code" autocomplete="off">
                    
                    <div id="error_code">
                        
                    </div>
                    
                  </div>
              <div class="subtotal-pay">
                  <p>Subtotal</p>    
                  <p id="amount_payment2">150 U$D</p>
              </div>
              <div class="agreement-pay">
                  <p>@lang('payment.form.condition')</p>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="terms_conditions" required>
                      <label class="form-check-label" for="terms_conditions">
                        @lang('payment.form.agree')
                      </label>
                  </div>
              </div>
              <div class="pay-now">
                <p><object data="{{ asset('site_assets/img/icon-feather-lock.svg') }}" type="image/svg+xml"></object> @lang('payment.form.secure')</p>
                  <button id="btn-payment" type="submit" class="btn-green-apple">@lang('payment.form.button')</button>
                  <div id="paypal-button-container" style="display: none;"></div>
              </div>

            </form>
          </div>
      </div>
      <div class="col-md-6 d-lg-none">
            <div class="manual-text">
                <p>@lang('payment.p_2')</p>
            </div>
      </div>
  </div>
</div>
 
</section>
@endsection

@section('scripts')

<script
src="https://www.paypal.com/sdk/js?client-id={{ env('CLIENT_ID') }}"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    let urlCreateOrder = "{{ route('paypal.create.order') }}";
    let urlCaptureOrder = "{{ route('paypal.capture.order') }}";
    const constAmountPaypal = "{{ $paymentsMethods[0]->details->amount }}";
    let amountPaypal = "{{ $paymentsMethods[0]->details->amount }}";
    const constAmountMP = "{{ $paymentsMethods[1]->details->amount }}";
    let amountMP = "{{ $paymentsMethods[1]->details->amount }}";
    const URL_REDIRECT = "{{ route('steps') }}";
    const URL_DICOUNT_CODE = "{{ route('get.promo.code') }}";

    $('.step1').addClass("active");
    $('.paso-mobile').text("{{ __('layout.nav_bar_steps.step1') }}");
    

</script>
<script src="{{ asset('js/paymentMethod.js') }}"></script>

    
@endsection
