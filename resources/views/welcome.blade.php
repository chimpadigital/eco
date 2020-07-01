@extends('layouts.site')
@section('content')
    
<section id="header-landing">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-md-center">
                <div class="center-mobile">
                    <h1>REVOLUCIONÁ TU PLÁSTICO</h1>
                    <hr>
                    <p class="mb-5">Convertite en un replicador comunitario</p>
                    <div class="d-none d-sm-block">
                        <a href="#mas-info" class="ancla" data-ancla="mas-info">
                            <button type="submit" class="btn-green-apple">Más información</button>
                        </a>
                        <a href="{{ route('login') }}">
                            <button type="submit" class="btn-green-apple btn-secondary">Acceder</button>
                        </a>
                    </div>
                    <div class="d-block d-sm-none">
                        <a href="#mas-info" class="ancla" data-ancla="mas-info">
                            <button type="submit" class="btn-green-apple">Más info</button>
                    
                        </a>
                        <a href="{{ route('login') }}">
                            <button type="submit" class="btn-green-apple btn-secondary">Acceder</button>
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
                    <h1>MANUAL DE RÉPLICA</h1>
                    <hr>
                    <p>Este Manual contiene todos los pasos necesarios, información y contenidos
                        requeridos para reproducir el proyecto en otros lugares del mundo.</p>
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
                        <p>El archivo completo contiene 4 bloques</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="block-file">
                                    <div class="block-icon">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-book-blue.svg">
                                    </div>
                                    <p>Documento del Manual<br>
                                        completo</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file">
                                    <div class="block-icon icon-video">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-video-blue.svg">
                                    </div>
                                    <p>Vídeo explicativo paso a paso del proceso de producción del Eco-ladrillo</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file block-file-right">
                                    <div class="block-icon icon-question">
                                        <img src="{{ asset('site_') }}assets/img/icon-awesome-question-blue.svg">
                                    </div>
                                    <p>Documento de Preguntas Frecuentes. (FAQS)</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block-file block-file-right">
                                    <div class="block-icon icon-file">
                                        <img src="{{ asset('site_') }}assets/img/icon-feather-file-plus-blue.svg">
                                    </div>
                                    <p>3 Anexos técnicos que completan la información
                                        del Manual
                                </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="block-file-foot">
                                    <div class="block-icon">
                                        <img src="{{ asset('site_') }}assets/img/professions-and-jobs.svg">
                                    </div>
                                    <p>Incluye <strong>2 sesiones de asistencia virtual</strong> a realizar en un <strong>plazo de 30 días</strong> desde que se 
                                        realiza la descarga , las cuales deberán ser coordinadas previamente con la fundación</p>
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
            <button type="submit" class="btn-green-apple handbook-btn">Descargar</button>
        </a>
    </div>
</section>

<section id="eco-inversion">
    <div class="container">
        <div class="row">
            <div class="col-md-7 align-self-center">
                <div class="center-mobile">
                    <h1>Estás a punto de comenzar el proceso de descarga del Manual de Réplica de la Fundación</h1>
                    <a href="#">
                        <img src="assets/img/btn-eco-inversion.svg" class="ecoinversion">
                    </a><br>
                    <button type="submit" class="btn-green-apple btn-orange">Iniciar descarga <img src="assets/img/icon-feather-arrow-right.svg"></button>
                </div>
            </div>
            <div class="col-md-5 d-flex flex-row-reverse p-sm-0">
                <div class="box-form">
                    <h3>Para iniciar, por favor,<br/>
                        completa el siguiente formulario</h3>    
                    <hr>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="col p-0">
                            
                            <div class="form-group mt-4">
                            
                                <input type="text" class="form-control input-custom" name="name" value="{{ old('name') }}" placeholder="Nombre" required @error('name') autofocus @enderror>
                                
                                @error('name')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror
                            
                         
                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido" required  @error('lastname') autofocus @enderror>
                                
                                @error('lastname')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">

                                <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="top"  data-html="true" title="<b>IMPORTANTE:</b> Introducir mail válido 
                                    
                                    <br> Tener en cuenta que con este dato podrá acceder a la descarga del manual">
                                    
                                    <img src="{{ asset('site_') }}assets/img/icon-awesome-info-circle.svg">
                                
                                </button>
                        
                                <input type="email" class="form-control input-custom" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required @error('email') autofocus @enderror>
                                
                                @error('email')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                           
                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="phone" value="{{ old('phone') }}" placeholder="Teléfono" required  @error('phone') autofocus @enderror>
                                
                                @error('phone')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <div class="form-group">
                        
                                <input type="text" class="form-control input-custom" name="city" value="{{ old('city') }}" placeholder="Ciudad" required  @error('city') autofocus @enderror>
                                
                                @error('city')
                                    
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                    </span>
                                
                                @enderror

                            </div>
                        
                        </div>
                        
                        <div class="col p-0">
                        
                            <select class="custom-select" name="country_id" required  @error('country_id') autofocus @enderror>
                        
                                <option selected disabled>País de residencia</option>
                                
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
                                <a href="{{route('terms')}}" target="_blank">Acepto las Condiciones Generales de Uso</a>
                            </label>
                        </div>
                        <button type="submit" class="btn-green-apple">Comenzar</button>
                        <hr>
                        <p>Puedes leer más sobre la Política de Protección de datos <a href="{{route('policies')}}" target="_blank">aquí</a></p>
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
            <h2 class="color-azul">¿Ya pagaste?</h2>
            <p>Si ya realizaste el pago exitosamente, podes continuar con el proceso para convertirte en un replicador ingresando con tu correo electrónico.</p>                
        
            <a href="{{ route('login') }}">
                <button type="submit" class="btn-green-apple">Ingresa aquí</button>
            </a>
        </div>
    </div>
</div>

<div class="container d-none d-sm-block">
    <div class="banner-pay d-flex">
        <img src="{{ asset('site_') }}assets/img/img-banner-pay.png">
        <div class="banner-pay-text align-self-center">
            <h2 class="color-azul">¿Ya pagaste?</h2>
            <p>Si ya realizaste el pago exitosamente, podes continuar con el proceso para convertirte en un replicador ingresando con tu correo electrónico.</p>                
        </div>
        <div class="align-self-center">
            <a href="{{ route('login') }}">
                <button type="submit" class="btn-green-apple">Ingresa aquí</button>
            </a>
        </div>
    </div>
</div>


<footer class="footer-landing">
    <div class="container d-lg-flex">
        <img src="{{ asset('site_assets/img/logo-white.svg') }}" alt="Logo Eco Inclusión">
        <p>Puedes consultar sobre los proyectos de la Fundación accediendo al <a href="https://ecoinclusion.org/causas/" target="_blank">Banco de Causas</a> de nuestra web y así conocer nuestro trabajo en territorio.</p>
    </div>
</footer>
@endsection