@extends('layouts.site')

@section('content')
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="box">
                    <div class="icon-banner">
                        <img src="{{ asset('site_assets/img/icon-open-account-login-lg.svg') }}" alt="">
                    </div>
                    <h1>@lang('login.title_1')</h1>
                    <p>@lang('login.p_1')</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                        
                         <input type="text" class="form-control input-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="@lang('login.input_1')" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">

                            <input type="password" class="form-control input-custom @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            
                        </div> 
                    
                        <button type="submit" class="btn-green-apple">@lang('login.btn')</button>

                        {{-- @if (Route::has('password.request'))
                            <br>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
