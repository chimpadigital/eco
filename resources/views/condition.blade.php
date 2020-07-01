@extends('layouts.site')

@section('content')
    
<section id="confidentiality">
    <div class="container">
        <div class="text-center">
            <h1>@lang('condition.title_1')</h1>
            <p>@lang('condition.p_1')</p>
        </div>
        
        <h2>@lang('condition.title_2')</h2>
        <ol class="manifiesto">
            <li>@lang('condition.p_2')</li>
            <li>@lang('condition.p_3')</li>
            <li>@lang('condition.p_4')
            </li>
            <li>@lang('condition.p_5')
            </li>
        </ol>

        <h2>@lang('condition.title_3')</h2>
        <ol>
            <li class="mt-3">@lang('condition.p_6')<br>
                @lang('condition.p_7')
            </li>
            <li>@lang('condition.p_8')<br>
                @lang('condition.p_9')
                </li>
            <li>@lang('condition.p_10')<br>
                @lang('condition.p_11') 
            </li>
            <li>@lang('condition.p_12')
            </li>
            <ol class="alpha">
                <li>@lang('condition.p_13')</li>
                <li>@lang('condition.p_14')</li>
                <li>@lang('condition.p_15')</li>
                <li>@lang('condition.p_16')</li>
                <li>@lang('condition.p_17')</li><br>
                <span>@lang('condition.p_18')</span><br>
            </ol>
            <li>@lang('condition.p_19')<br>
                @lang('condition.p_20')
            </li>
            <li>@lang('condition.p_21')<br>
                @lang('condition.p_22')
            </li>
            <li>@lang('condition.p_23')<br>
                @lang('condition.p_24')
            </li>
            <li>@lang('condition.p_25')<br>
                @lang('condition.p_26')
            </li>
            <li>@lang('condition.p_27')<br>
                @lang('condition.p_28')
            </li>
            <li>@lang('condition.p_29')<br>
                @lang('condition.p_30')
            </li>
            <li>@lang('condition.p_31')<br>
                @lang('condition.p_32')
            </li>
            <ol class="alpha">
                <li>@lang('condition.p_33')</li>
                <li>@lang('condition.p_34')</li>
                <li>@lang('condition.p_35')</li>
            </ol>
        </ol>
        <a class="btn-blue" href="{{route('payment.methods')}}"><img src="{{asset('site_')}}assets/img/icon-feather-chevron-left.png"> @lang('condition.btn')</a>
    </div>
</section>


@endsection