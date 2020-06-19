@extends('layouts.site')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="banner">
                <div class="back"></div>
                <div class="icon-banner">
                    <img src="{{ asset('site_assets/img/icon-check-pago.svg') }}">
                </div>
                <h1>PAGO EXITOSO</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-meet">
                <p>Antes de continuar</p>
                <h2>¡Queremos conocerte!</h2>
                <p>Para la fundación es muy importante saber quienes son los replicadores </br>
                    de nuestro proyecto en todo el mundo, por eso queremos conocerte.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-8 mb-5">
            <div class="form-meet">
                <p><img src="{{ asset('site_assets/img/icon-users.svg') }}">Datos Personales</p>
                <form method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control input-custom" name="firstname" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control input-custom" name="lastname" placeholder="Apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="email" class="form-control input-custom" name="email" placeholder="Correo Electrónico" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="date" class="form-control input-custom" name="birthday" placeholder="Fecha de nacimiento" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control input-custom" name="city" placeholder="Ciudad de residencia" required>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <select class="custom-select input-custom" name="country" required>
                                <option selected disabled>País de residencia</option>
                                
                                @forelse ($countries as $country)
                                
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                
                                @empty
                                    
                                @endforelse
                                
                              </select>
                        </div>
                    </div>
                
                    <p><img src="{{ asset('site_assets/img/icon-bag.svg') }}">Ocupación</p>
                
                    <div class="form-group mb-4">
                        <select class="custom-select input-custom">
                            <option selected>Elegir opción</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                
                    <p><img src="{{ asset("site_assets/img/icon-cursor.svg") }}">Redes sociales (opcional)</p>
               
                    <div class="form-group">
                        <input type="text" class="form-control input-custom" placeholder="Facebook">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom" placeholder="Linkedin">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom" placeholder="Instagram">
                    </div>
                    <div class="form-group mb-5">
                        <input type="text" class="form-control input-custom" placeholder="Otras">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-custom" placeholder="¿Por qué estás interesado en fabricar eco-ladrillos? ¿Cuál es tu motivación?"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-custom" placeholder="¿Ya conocías a la fundación previamente?"></textarea>
                    </div>
              
                    <small>¿Perteneces a alguna asociación, ONG, empresa o entidad estatal?</small>
               
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom" placeholder="En caso afirmativo ¿Cuál?">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom" placeholder="¿Tiene página web?">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-custom" placeholder="Para implementar este proyecto ¿Tienes aliados?  (Organización, comunidad, empresa, grupo de interés, etc)"></textarea>
                    </div>
         
                    <small>¿Con anterioridad ya has implementado algún proyecto en tu comunidad?</small>
 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-custom" placeholder="¿De qué tipo? ¿Qué clase de impacto tuvo?"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-custom" placeholder="Información extra que nos quieras contar"></textarea>
                    </div>
                    <button type="submit" class="btn-green-apple">Enviar y continuar <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></button>
                </form>
            </div>
        </div>
        
    </div>
</div>


@endsection