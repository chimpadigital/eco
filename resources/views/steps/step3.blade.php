@extends('layouts.site')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-next-step float-right">
                <span>Siguiente paso</span>
                <button type="submit" class="btn-green-apple">Registrar sesiones <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="banner banner-download">
                <div class="back"></div>
                <div class="icon-banner icon-download">
                    <img src="{{ asset('site_assets/img/icon-download.svg') }}" alt="">
                </div>
                <h1>DESCARGAR MANUAL</h1>
                <p>Una vez descargados los 4 elementos que conforman el manual</br>
                    podrás continuar para registrar tus sesiones de asistencia virtual</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-download-files">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="icon-download">
                            <img src="{{ asset('site_assets/img/icon-feather-book.svg') }}">
                        </div>
                        <img src="assets/img/icon-check-download.svg">
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="icon-download">
                            <img src="{{ asset('site_assets/img/icon-feather-video.svg') }}">
                        </div>
                        <a href="" class="btn btn-download">Descargar Videos
                            <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        </a>
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="icon-download">
                            <img src="{{ asset('site_assets/img/icon-awesome-question.svg') }}">
                        </div>
                        <a href="" class="btn btn-download">Descargar FAQs
                            <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        </a>
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="icon-download">
                            <img src="{{ asset('site_assets/img/icon-feather-file-plus.svg') }}">
                        </div>
                        <a href="" class="btn btn-download">Descargar anexos
                            <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="box-next-step float-right">
                <span>Siguiente paso</span>
                <button type="submit" class="btn-green-apple">Registrar sesiones <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></button>
            </div>
        </div>
    </div>
</div>


@endsection