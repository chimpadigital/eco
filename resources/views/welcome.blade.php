@extends('layouts.site')
@section('content')
    
<section id="header-landing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h1>REVOLUCIONÁ TU PLÁSTICO</h1>
                            <hr>
                            <p class="mb-5">Convertite en un replicador comunitario</p>
                            <button type="submit" class="btn-green-apple">Más información</button>
                            <button type="submit" class="btn-green-apple btn-secondary">Acceder</button>
                        </div>
                        <div class="col-md-6">
                        <img src="{{ asset('site_assets/img/img-landing-header.png') }}" alt="imagen header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="handbook-container">
                <h1>REVOLUCIONÁ TU PLÁSTICO</h1>
                <hr>
                <p>Este Manual contiene todos los pasos necesarios, información y contenidos<br>
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
                    <img class="arrow-left" src="{{ asset('site_assets/img/flech-landing.svg') }}">
                    <img class="arrow-right" src="{{ asset('site_assets/img/flech-landing.svg') }}">
                    <p>El archivo completo contiene 4 bloques</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="block-file">
                                <div class="block-icon">
                                    <img src="{{ asset('site_assets/img/icon-feather-book-blue.svg') }}">
                                </div>
                                <p>Documento del <br>
                                    completo</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block-file">
                                <div class="block-icon icon-video">
                                    <img src="{{ asset('site_assets/img/icon-feather-video-blue.svg') }}">
                                </div>
                                <p>Vídeo explicativo paso a paso del proceso de producción del Eco-ladrillo</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block-file block-file-right">
                                <div class="block-icon">
                                    <img src="{{ asset('site_assets/img/icon-awesome-question-blue.svg') }}">
                                </div>
                                <p>Documento de Preguntas Frecuentes. (FAQS)</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block-file block-file-right">
                                <div class="block-icon">
                                    <img src="{{ asset('site_assets/img/icon-feather-file-plus-blue.svg') }}">
                                </div>
                                <p>3 Anexos técnicos que completan la información
                                    del Manual
                            </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="block-file-foot">
                                <div class="block-icon">
                                    <img src="{{ asset('site_assets/img/professions-and-jobs.svg') }}">
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
    <button type="submit" class="btn-green-apple handbook-btn">Descargar</button>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
           <div class="box-eco-inversion">
               <div class="container">
                   <div class="row">
                       <div class="col-md-7 align-self-center">
                            <h1>Estás a punto de comenzar el proceso de descarga del Manual de Réplica de la Fundación</h1>
                            <a href="#">
                                <img src="{{ asset('site_assets/img/btn-eco-inversion.svg') }}" class="ecoinversion">
                            </a><br>
                            <button type="submit" class="btn-green-apple btn-orange">Iniciar descarga <img src="{{ asset('site_assets/img/icon-feather-arrow-right.svg') }}"></button>
                        </div>
                        <div class="col-md-5 d-flex flex-row-reverse">
                            <div class="box-form">
                                <h3>Para iniciar, por favor,<br/>
                                    completa el siguiente formulario</h3>    
                                <hr>
                                
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="col p-0">
                                        
                                        <div class="form-group mt-4">
                                        
                                            <input type="text" class="form-control input-custom" name="name" value="{{ old('name') }}" placeholder="Nombre" required>
                                            
                                            @error('name')
                                                
                                                <span class="invalid-feedback" role="alert">
                                                
                                                    <strong>{{ $message }}</strong>
                                                
                                                </span>
                                            
                                            @enderror
                                        
                                     
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col p-0">
                                    
                                        <div class="form-group">
                                    
                                            <input type="text" class="form-control input-custom" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido" required>
                                            
                                            @error('lastname')
                                                
                                                <span class="invalid-feedback" role="alert">
                                                
                                                    <strong>{{ $message }}</strong>
                                                
                                                </span>
                                            
                                            @enderror

                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col p-0">
                                    
                                        <div class="form-group">
                                    
                                            <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="top"  data-html="true" title="<b>IMPORTANTE:</b> Introducir mail válido 
                                    
                                                <br> Tener en cuenta que con este dato podrá acceder a la descarga del manual">
                                    
                                                <img src="{{ asset('site_assets/img/icon-awesome-info-circle.svg') }}">
                                    
                                            </button>
                                    
                                            <input type="email" class="form-control input-custom" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required>
                                            
                                            @error('email')
                                                
                                                <span class="invalid-feedback" role="alert">
                                                
                                                    <strong>{{ $message }}</strong>
                                                
                                                </span>
                                            
                                            @enderror

                                       
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col p-0">
                                    
                                        <div class="form-group">
                                    
                                            <input type="text" class="form-control input-custom" name="phone" value="{{ old('phone') }}" placeholder="Teléfono" required>
                                            
                                            @error('phone')
                                                
                                                <span class="invalid-feedback" role="alert">
                                                
                                                    <strong>{{ $message }}</strong>
                                                
                                                </span>
                                            
                                            @enderror

                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col p-0">
                                    
                                        <div class="form-group">
                                    
                                            <input type="text" class="form-control input-custom" name="city" value="{{ old('city') }}" placeholder="Ciudad" required>
                                            
                                            @error('city')
                                                
                                                <span class="invalid-feedback" role="alert">
                                                
                                                    <strong>{{ $message }}</strong>
                                                
                                                </span>
                                            
                                            @enderror

                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col p-0">
                                    
                                        <select class="custom-select" name="country_id" required>
                                    
                                            <option selected disabled>País de residencia</option>
                                            
                                            @forelse ($countries as $country)
                                            
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            
                                            @empty
                                                
                                            @endforelse
                                            
                                        </select>

                                        @error('country_id')
                                                
                                            <span class="invalid-feedback" role="alert">
                                            
                                                <strong>{{ $message }}</strong>
                                            
                                            </span>
                                        
                                        @enderror
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label" for="defaultCheck1">
                                            <a href="{{route('terms')}}">Acepto las Condiciones Generales de Uso</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn-green-apple">Comenzar</button>
                                </form>
                                <hr>
                                <p>Puedes leer más sobre la Política de Protección de datos <a href="politicas-privacidad.html">aquí</a></p>
                            </div>
                        </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="banner-pay d-flex">
        <img src="{{ asset('site_assets/img/img-banner-pay.png') }}">
        <div class="banner-pay-text align-self-center">
            <h2 class="color-azul">¿Ya pagaste?</h2>
            <p>Si ya realizaste el pago exitosamente, podes continuar con el proceso para convertirte en un replicador ingresando con tu correo electrónico.</p>                
        </div>
        <div class="align-self-center">
            <a href="{{ route('login') }}" class="btn-green-apple">Ingresa aquí</a>
        </div>
    </div>
</div>

<div class="alert-cookie">
    <div class="container d-flex">
        <p>Todos tus datos personales serán protegidos acorde a la <a href="">Ley 25.326 de protección de datos personales</a>, regida en la República Argentina, donde se contempla 
            la facultad de ejercer el derecho de acceso a los mismos en forma gratuita, solicitar el retiro o bloqueo, total o parcial en caso de ser necesario.</p>
        <div class="align-self-center">
            <button type="submit" class="btn-green-apple">Acepto</button>
        </div>
    </div>
</div>

<footer class="footer-landing">
    <div class="container d-flex">
        <img src="{{ asset('site_assets/img/logo-white.svg') }}" alt="Logo Eco Inclusión">
        <p>Puedes consultar sobre los proyectos de la Fundación accediendo al <a href="">Banco de Causas</a> de nuestra web y así conocer nuestro trabajo en territorio.</p>
    </div>
</footer>
@endsection