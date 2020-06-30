@extends('layouts.site')

@section('content')

@include('steps.step_bar')

<section id="finalized-payment">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="banner">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="assets/img/icon-feather-heart.svg">
                    </div>
                    <h1>¡TUS SESIONES DE ASISTENCIAS VIRTUALES YA HAN SIDO AGENDADAS CON ÉXITO!</h1>
                    <p>Desde la fundación te enviamos un correo con las fechas y horarios de cada sesión,
                        recomendamos utilizar<br> algún recordatorio para ese día, y poner atención especial
                        con el uso horario de Argentina</p>
                </div>
            </div>
        </div>
    </div>

    <div class="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5">
                        <p>Para nosotros es muy importante que se expanda el proyecto así que<br> muchas gracias por ayudarnos a llevarlo a cabo.</p>
                    </div>
                    <div class="blue-banner">
                        <p>En el transcurso del año, te contactaremos nuevamente para que nos cuentes cómo va el 
                            proyecto, tus logros y qué dificultades te has encontrado en el camino. </p>
                    </div>
                    <div class=" text-center">
                        <a href="http://ecoinclusion.org/" class="btn-green">TE INVITAMOS A VER NUESTRO SITIO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')

<script type="text/javascript">

    $('.step1').addClass("visited");
    $('.step2').addClass("visited");
    $('.step3').addClass("visited");
    $('.step4').addClass("visited");
</script>
    
@endsection