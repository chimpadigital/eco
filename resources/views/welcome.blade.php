@extends('layouts.site')
@section('content')
    
<section id="header-landing">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-md-center">
                <div class="center-mobile">
                    <h1>@lang('welcome.section_1.title_1')</h1>
                    <hr>
                    <p class="mb-5">@lang('welcome.section_1.p_1')</p>
                    <div class="d-none d-sm-block">
                        <a href="#mas-info" class="ancla" data-ancla="mas-info">
                            <button type="submit" class="btn-green-apple">@lang('welcome.section_1.button_1')</button>
                        </a>
                        <a href="{{ route('login') }}">
                            <button type="submit" class="btn-green-apple btn-secondary">@lang('welcome.section_1.button_2')</button>
                        </a>
                    </div>
                    <div class="d-block d-sm-none">
                        <a href="#mas-info" class="ancla" data-ancla="mas-info">
                            <button type="submit" class="btn-green-apple">@lang('welcome.section_1.button_1')</button>
                    
                        </a>
                        <a href="{{ route('login') }}">
                            <button type="submit" class="btn-green-apple btn-secondary">@lang('welcome.section_1.button_2')</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('site_') }}assets/img/img-landing-header.png" alt="imagen header">
            </div>
        </div>
    </div>
</section>


<section id="mas-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="handbook-container">
                    <h1>@lang('welcome.section_2.title_1')</h1>
                    <hr>
                    <p>@lang('welcome.section_2.p_1')</p>
                </div>
            </div>
        </div>
    </div>

    <div id="handbook"">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="blocks-container">
                        <img class="arrow-left" src="assets/img/flech-landing.svg">
                        <img class="arrow-right" src="assets/img/flech-landing.svg">
                        <p>@lang('welcome.section_2.p_2')</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="block-file">
                                    <div class="block-icon">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-book-blue.svg">
                                    </div>
                                    <p>@lang('welcome.section_2.b_1')</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file">
                                    <div class="block-icon icon-video">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-video-blue.svg">
                                    </div>
                                    <p>@lang('welcome.section_2.b_2')</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file block-file-right">
                                    <div class="block-icon icon-question">
                                        <img src="{{ asset('site_') }}assets/img/icon-awesome-question-blue.svg">
                                    </div>
                                    <p>@lang('welcome.section_2.b_3')</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file block-file-right">
                                    <div class="block-icon icon-file">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-file-plus-blue.svg">
                                    </div>
                                    <p>@lang('welcome.section_2.b_4')</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="block-file-foot">
                                    <div class="block-icon">
                                        <img src="{{ asset('site_') }}assets/img/professions-and-jobs.svg">
                                    </div>
                                    <p>@lang('welcome.section_2.info_card')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <a href="#eco-inversion">
            <button type="submit" class="btn-green-apple handbook-btn">@lang('welcome.section_2.button_1')</button>
        </a>
    </div>
</section>

<section id="eco-inversion">
    <div class="container">
        <div class="row">
            <div class="col-md-7 align-self-center">
                <div class="center-mobile">
                    <h1>@lang('welcome.section_3.title_1')</h1>
                    <a href="#">
                        <img src="assets/img/btn-eco-inversion.svg" class="ecoinversion">
                    </a><br>
                    <button type="submit" class="btn-green-apple btn-orange">@lang('welcome.section_3.button_1') <img src="assets/img/icon-feather-arrow-right.svg"></button>
                </div>
            </div>
            <div class="col-md-5 d-flex flex-row-reverse p-sm-0">
                <div class="box-form">
                    <h3>@lang('welcome.section_3.form.p_1')</h3>    
                    <hr>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="col p-0">
                            
                            <div class="form-group mt-4">
                            
                                <input type="text" class="form-control input-custom" name="name" value="{{ old('name') }}" placeholder="@lang('welcome.section_3.form.input_1')" required @error('name') autofocus @enderror>
                                
                                @error('name')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror
                            
                         
                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="lastname" value="{{ old('lastname') }}" placeholder="@lang('welcome.section_3.form.input_2')" required  @error('lastname') autofocus @enderror>
                                
                                @error('lastname')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">

                                <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="top"  data-html="true" title="@lang('welcome.section_3.form.tooltip')">
                                    
                                    <img src="{{ asset('site_') }}assets/img/icon-awesome-info-circle.svg">
                                
                                </button>
                        
                                <input type="email" class="form-control input-custom" name="email" value="{{ old('email') }}" placeholder="@lang('welcome.section_3.form.input_3')" required @error('email') autofocus @enderror>
                                
                                @error('email')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                           
                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="phone" value="{{ old('phone') }}" placeholder="@lang('welcome.section_3.form.input_4')" required  @error('phone') autofocus @enderror>
                                
                                @error('phone')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="city" value="{{ old('city') }}" placeholder="@lang('welcome.section_3.form.input_5')" required  @error('city') autofocus @enderror>
                                
                                @error('city')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <select class="custom-select" name="country_id" required  @error('country_id') autofocus @enderror>
                        
                                <option selected disabled>@lang('welcome.section_3.form.input_6')</option>
                                
                                @forelse ($countries as $country)
                                
                                    <option {{ $country->id == old('country_id') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                
                                @empty
                                    
                                @endforelse
                                
                            </select>

                            @error('country_id')
                                    
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                
                                    <strong>{{ $message }}</strong>
                                
                                </span>
                            
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                            <label class="form-check-label" for="defaultCheck1">
                                <a href="{{route('terms')}}" target="_blank">@lang('welcome.section_3.form.term')</a>
                            </label>
                        </div>
                        <button type="submit" class="btn-green-apple">@lang('welcome.section_3.form.button')</button>
                        <hr>
                        <p>@lang('welcome.section_3.form.policies')</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container d-block d-sm-none">
    <div class="banner-pay-mobile d-flex">
        <img src="{{ asset('site_') }}assets/img/img-banner-pay-mobile.png">
        <div class="banner-pay-text align-self-center">
            <h2 class="color-azul">@lang('welcome.section_4.title_1')</h2>
            <p>@lang('welcome.section_4.p_1')</p>                
        
            <a href="{{ route('login') }}">
                <button type="submit" class="btn-green-apple">@lang('welcome.section_4.button_1')</button>
            </a>
        </div>
    </div>
</div>

<div class="container d-none d-sm-block">
    <div class="banner-pay d-flex">
        <img src="{{ asset('site_') }}assets/img/img-banner-pay.png">
        <div class="banner-pay-text align-self-center">
            <h2 class="color-azul">@lang('welcome.section_4.title_1')</h2>
            <p>@lang('welcome.section_4.p_1')</p>                
        </div>
        <div class="align-self-center">
            <a href="{{ route('login') }}">
                <button type="submit" class="btn-green-apple">@lang('welcome.section_4.button_1')</button>
            </a>
        </div>
    </div>
</div>


<footer class="footer-landing">
    <div class="container d-lg-flex">
        <img src="{{ asset('site_assets/img/logo-white.svg') }}" alt="Logo Eco Inclusión">
        <p>@lang('welcome.footer.p_1')</p>
    </div>
</footer>
@endsection