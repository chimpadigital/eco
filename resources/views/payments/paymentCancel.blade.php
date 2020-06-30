@extends('layouts.site')

@section('content')

<div id="page-error">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="box">
                    <div class="back"></div>
                    <div class="icon-banner">
                        <img src="{{asset('site_')}}assets/img/icon-shapes-and-symbols.svg" alt="">
                    </div>
                    <h1>NO SE PUDO PROCESAR EL PAGO </h1>
                    <hr>
                    <p>Para volver a intentarlo regrese al paso anterior haciendo click 
                    en el siguiente botón</p>
                    <a href="{{ route('steps') }}">
                        <button type="submit" class="btn-green-apple">Volver a pagar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection