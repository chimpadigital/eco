<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eco Inclusión - Pago del manual</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('site_assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site_assets/lib/bootstrap/css/bootstrap.min.css') }}">

     {{-- toas --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <!-- Jalendar CSS -->
     <link
       rel="stylesheet"
       href="{{asset('/')}}assets/lib/jalendar/style/jalendar.css"
       type="text/css"
     />
  </head>
  <body>
    <div style="visibility:hidden;" class="loader-page"></div>

        <nav class="navbar navbar-expand-lg navbar-light custom-bar">
            <div class="container">
            
            <a class="navbar-brand" href="{{ route('/') }}"><img src="{{ asset('site_assets/img/logo.svg') }}" width="150" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @auth
                        <li class="nav-item active landing-active">

                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                @lang('layout.nav_bar.close_session')
                                <img src="{{ asset('site_') }}assets/img/icon-open-account-login-green.svg">
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                        @endauth
                        @guest
                            <li class="nav-item active landing-active">
                                <a class="nav-link" href="{{ route('login') }}" active>@lang('layout.nav_bar.init_session')
                                    <img src="{{ asset('site_') }}assets/img/icon-open-account-login-green.svg">
                                </a>
                            </li>
                        @endguest
                        
                        <li class="nav-item">
                            <a class="nav-link icon-nav" href="{{ route('/') }}">@lang('layout.nav_bar.back_site')
                                <img src="{{ asset('site_') }}assets/img/icon-feather-home.svg">
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            @if (app()->getLocale() =="es")

                            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Español
                                <!-- <img src="{{ asset('site_') }}assets/img/idioma1.svg"> -->
                                <img class="" src="{{asset('site_')}}assets/img/icon-ionic-ios-arrow-down.svg">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('locale/en') }}">English
                                <!-- <img src="{{ asset('site_') }}assets/img/idioma2.svg">-->
                                </a> 
                            </div>
                            @else

                            <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                English
                                <!-- <img src="{{ asset('site_') }}assets/img/idioma2.svg"> -->
                                <img class="" src="{{asset('site_')}}assets/img/icon-ionic-ios-arrow-down.svg">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('locale/es') }}">Español
                                <!-- <img src="{{ asset('site_') }}assets/img/idioma1.svg"> -->
                                </a>
                            </div>

                            @endif
                        </li> 
                    </ul>
                    
                </div>
            </div>
        </nav>
        
    
       @yield('content')
       @include('cookieConsent::index')
   
    
    <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.3.min.js"
  ></script>
  <!--jQuery-->
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha256-ZsWP0vT+akWmvEMkNYgZrPHKU9Ke8nYBPC3dqONp1mY=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/es.min.js" integrity="sha256-TaYFETQITAuqJfL0mn0Mxcq6cM1uFvNOC3JcOaCGAs0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script
    
    src="{{asset('assets/lib/jalendar/js/jalendar.js')}}"
  ></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script  src="{{asset('/site_')}}assets/js/custom.js"></script>
    
  @include('sweet::alert')
    
  @yield('scripts')
</body>
</html>
