@extends('layouts.site')

@section('content')

<div id="page-error">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="box">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="{{asset('site_')}}assets/img/icon-shapes-and-symbols.svg" alt="">
                    </div>
                    <h1>@lang('payment.payment_cancel.title_1')</h1>
                    <hr>
                    <p>@lang('payment.payment_cancel.p_1')</p>
                    <a href="{{ route('steps') }}">
                        <button type="submit" class="btn-green-apple">@lang('payment.payment_cancel.btn')</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection