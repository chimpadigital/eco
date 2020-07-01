@extends('layouts.site')

@section('content')

<section id="terms-of-use">
    <div class="container">
        <h1>@lang('terms.title_1')</h1>
        <p><strong>@lang('terms.p_1')</strong></p>
        <p>@lang('terms.p_2')</p>
        
        <h2>@lang('terms.title_2')</h2>
        <p>@lang('terms.p_3')</p>

        
        <ol>
            <li><h2>@lang('terms.title_3')</h2>
                <ol>
                    <li>@lang('terms.p_4')
                    </li>
                    <li>@lang('terms.p_5')
                    </li>
                    <li>@lang('terms.p_6')
                    </li>
                </ol>
            </li>
            <li><h2>@lang('terms.title_4')</h2>
                <ol>
                    <li>@lang('terms.p_7')
                    </li>
                    <li>@lang('terms.p_8')
                    </li>
                </ol>
            </li>
            <li><h2>@lang('terms.title_5')</h2>
                <ol>
                    <li>@lang('terms.p_9')
                    </li>
                    <li>@lang('terms.p_10')
                    </li>
                    <li>@lang('terms.p_11')
                    </li>
                </ol>
            </li>
            <li><h2>@lang('terms.title_6')s</h2>
                <ol>
                    <li>@lang('terms.p_12')
                    </li>
                </ol>
            </li>
            <li><h2>@lang('terms.title_7')</h2>
                <ol>
                    <li>@lang('terms.p_13')
                    </li>
                    <li>@lang('terms.p_14')
                    </li>
                </ol>
            </li>
        </ol>
        <a class="btn-blue" href="{{ route('/') }}"><img src="{{asset('site_')}}assets/img/icon-feather-chevron-left.png"> @lang('terms.btn')</a>
    </div>
</section>
    
@endsection