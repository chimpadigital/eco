@extends('layouts.site')

@section('content')

@include('steps.step_bar')

<section id="finalized-payment">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="banner">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="assets/img/icon-feather-heart.svg">
                    </div>
                    <h1>@lang('finalize.title_1')</h1>
                    <p>@lang('finalize.p_1')</p>
                </div>
            </div>
        </div>
    </div>

    <div class="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5">
                        <p>@lang('finalize.p_2')</p>
                    </div>
                    <div class="blue-banner">
                        <p>@lang('finalize.p_3')</p>
                    </div>
                    <div class=" text-center">
                        <a href="http://ecoinclusion.org/" class="btn-green">@lang('finalize.btn')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')

<script type="text/javascript">

    $('.step1').addClass("visited");
    $('.step2').addClass("visited");
    $('.step3').addClass("visited");
    $('.step4').addClass("visited");
    $('.paso-mobile').text("{{ __('layout.nav_bar_steps.step4') }}");
</script>
    
@endsection