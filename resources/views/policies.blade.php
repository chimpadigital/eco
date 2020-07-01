@extends('layouts.site')
@section('content')
<section id="privacy-policies">
    <div class="container">
        <h1>@lang('policies.title_1')</h1>
        <p>@lang('policies.p_1')
        </p>
        <p>@lang('policies.p_2')
        </p>
        <a class="btn-blue" href="{{route('/')}}"><img src="{{asset('site_')}}assets/img/icon-feather-chevron-left.png"> @lang('policies.btn')</a>
    </div>
</section>
@endsection