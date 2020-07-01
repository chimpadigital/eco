@extends('layouts.site')

@section('content')

<div id="page-error">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="box color-orange">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="{{asset('site_')}}assets/img/pendiente.svg" alt="">
                    </div>
                    <h1>@lang('payment.payment_pending.title_1')</h1>
                    <hr>
                    <p>@lang('payment.payment_pending.p_1')</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection