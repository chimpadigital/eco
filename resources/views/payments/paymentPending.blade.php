@extends('layouts.site')

@section('content')

<div id="page-error">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="box color-orange">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="{{assset('site_')}}assets/img/pendiente.svg" alt="">
                    </div>
                    <h1>ESTAMOS PROCESANDO EL PAGO</h1>
                    <hr>
                    <p>Una vez aprobado recibirá un mail para continuar con el proceso de descarga del manual</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection