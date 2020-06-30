@extends('layouts.site')


@section('content')

@include('steps.step_bar')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="banner">
                <div class="back"></div>
                <div class="icon-banner">
                    <img src="{{ asset('assets/img/icon-check-pago.svg') }}">
                </div>
                <h1>PAGO EXITOSO</h1>
            </div>
        </div>
    </div>
</div>
<section id="form-perfil-replicador">
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
                    <form method="POST" action="{{ route('inscription.form') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control input-custom" value="{{ $user->name }}" name="firstname" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control input-custom" value="{{ $user->lastname }}" name="lastname" placeholder="Apellido" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="email" class="form-control input-custom" name="email" value="{{ $user->email }}" placeholder="Correo Electrónico" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="date" class="form-control input-custom" name="birth_date" placeholder="Fecha de nacimiento" required>
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
                                <select class="custom-select" name="country_id" required>
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
                            <select class="custom-select" name="occupation">
                                <option selected>Elegir opción</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="emprendedor">Emprendedor</option>
                                <option value="profesional autónomo">Profesional autónomo</option>
                                <option value="docente">Docente</option>
                                <option value="representante de una organización">Representante de una organización</option>
                                <option value="miembro de una empresa">Miembro de una empresa</option>
                                <option value="miembro del estado">Miembro del estado</option>
                                <option value="otro (s)">otro (s)</option>
                            </select>
                        </div>
                    
                        <p><img src="{{ asset("site_assets/img/icon-cursor.svg") }}">Redes sociales (opcional)</p>
                
                        <div class="form-group">
                            <input type="text" class="form-control input-custom" name="facebook" value="{{ old('facebook') }}" placeholder="Facebook">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom" name="linkedin" value="{{ old('linkedin') }}" placeholder="Linkedin">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom" name="instagram" value="{{ old('instagram') }}" placeholder="Instagram">
                        </div>
                        <div class="form-group mb-5">
                            <input type="text" class="form-control input-custom" name="others" value="{{ old('others') }}" placeholder="Otras">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom" name="motivation" placeholder="¿Por qué estás interesado en fabricar eco-ladrillos? ¿Cuál es tu motivación?">{{ old('question1') }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom" name="did_you_know_foundation" placeholder="¿Ya conocías a la fundación previamente?">{{ old('question_2') }}</textarea>
                        </div>
                
                        <small>¿Perteneces a alguna asociación, ONG, empresa o entidad estatal?</small>
                        
                        <br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ong" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ong" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom" name="name_ogn" value="{{old('name_ogn')}}" placeholder="En caso afirmativo ¿Cuál?">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom" name="web_page" value="{{old('web_page')}}" placeholder="¿Tiene página web?">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom"  name="allies_to_implement" placeholder="Para implementar este proyecto ¿Tienes aliados?  (Organización, comunidad, empresa, grupo de interés, etc)">{{old('allies_to_implement')}}</textarea>
                        </div>
            
                        <small>¿Con anterioridad ya has implementado algún proyecto en tu comunidad?</small>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="implementation_ant" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="implementation_ant" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom"  name="impact_class" placeholder="¿De qué tipo? ¿Qué clase de impacto tuvo?">{{old('question_8')}}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom" name="extra_information" placeholder="Información extra que nos quieras contar">{{old('question_9')}}</textarea>
                        </div>
                        <button type="submit" class="btn-green-apple">Enviar y continuar <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>


@endsection

@section('scripts')

<script type="text/javascript">
    
    $('.step1').addClass("visited");
    $('.step2').addClass("active");
</script>
    
@endsection