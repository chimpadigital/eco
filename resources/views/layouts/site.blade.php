<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eco Inclusión - Pago del manual</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="stylesheet" href="{{ asset('site_assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site_assets/lib/bootstrap/css/bootstrap.min.css') }}">

  </head>
  <body>
    <div style="visibility:hidden;" class="loader-page"></div>
    <div class="{{ (request()->is('payments/*')) ? 'background-pago-manual' : '' }}">
        <nav class="navbar navbar-expand-lg navbar-light custom-bar">
            <div class="container">
            
              <a class="navbar-brand" href="index.html"><img src="{{ asset('site_assets/img/logo.svg') }}" width="150" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Ingresar <object data="{{ asset('site_assets/img/icon-open-account-login.svg') }}" type="image/svg+xml"></object></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Volver al sitio <object data="{{ asset('site_assets/img/icon-feather-home.svg') }}" type="image/svg+xml"></object></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Español
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Ingles</a>
                            </div>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group btn-group-toggle d-flex custom-btn-group" data-toggle="buttons">
                        <a href="#" id="step1" class="btn btn-custom" role="button" aria-pressed="true">
                            <img src="{{ asset('site_assets/img/icon-feather-dollar-sign.svg') }}" class="icon">Pago del manual
                            <img src="{{ asset('site_assets/img/icon-feather-chevron-down.svg') }}" class="icon-arrow">
                        </a>
                        <a href="#" id="step2" class="btn btn-custom" role="button" aria-pressed="true">
                            <img src="{{ asset('site_assets/img/icon-feather-user.svg') }}" class="icon">Perfil replicado
                            <img src="{{ asset('site_assets/img/icon-feather-chevron-down.svg') }}" class="icon-arrow">
                        </a>
                        <a href="#" id="step3" class="btn btn-custom" role="button" aria-pressed="true">
                            <img src="{{ asset('site_assets/img/icon-open-data-transfer-download.svg') }}" class="icon">Descarga de manual
                            <img src="{{ asset('site_assets/img/icon-feather-chevron-down.svg') }}" class="icon-arrow">
                        </a>
                        <a href="#" id="step4" class="btn btn-custom" role="button" aria-pressed="true">
                            <img src="{{ asset('site_assets/img/icon-awesome-comment-dots.svg') }}" class="icon">Sesiones de asistencia
                            <img src="{{ asset('site_assets/img/icon-feather-chevron-down.svg') }}" class="icon-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
       @yield('content')

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
