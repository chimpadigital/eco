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

                        @if ($downloadControl->element_1)

                            <img src="assets/img/icon-check-download.svg">

                        @else

                            <a href="#" id="a1" data-filename="download1.deb" class="btn btn-download">Descargar Manuales
                        
                                <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        
                            </a>

                        @endif
                        
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    
                    </div>
                    
                    <div class="col-md-3 text-center">
                    
                        <div class="icon-download">
                    
                            <img src="{{ asset('site_assets/img/icon-feather-video.svg') }}">
                    
                        </div>

                        @if ($downloadControl->element_2)

                            <img src="assets/img/icon-check-download.svg">

                        @else

                            <a href="#" id="a2" data-filename="download2.deb" class="btn btn-download">Descargar Videos
                        
                                <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        
                            </a>

                        @endif
                    
                        
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    
                    </div>
                    
                    <div class="col-md-3 text-center">
                    
                        <div class="icon-download">
                    
                            <img src="{{ asset('site_assets/img/icon-awesome-question.svg') }}">
                    
                        </div>

                        @if ($downloadControl->element_3)

                            <img src="assets/img/icon-check-download.svg">

                        @else

                            <a href="#" id="a3" data-filename="download3.deb" class="btn btn-download">Descargar FAQs
                        
                                <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        
                            </a>


                        @endif
                    
                        <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                    
                    </div>
                    
                    <div class="col-md-3 text-center">
                    
                        <div class="icon-download">
                    
                            <img src="{{ asset('site_assets/img/icon-feather-file-plus.svg') }}">
                    
                        </div>

                        @if ($downloadControl->element_4)

                            <img src="assets/img/icon-check-download.svg">

                        @else

                            <a href="#" id="a4" data-filename="download4.deb" class="btn btn-download">Descargar anexos
                    
                                <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                        
                            </a>


                        @endif
                    
                        
                    
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
@section('scripts')

<script type="text/javascript">
    document.getElementById('step3').classList.add("active");

    $('#a1').click(function() {
        var that = this;
        const page_url = '{{ route('download.content',1) }}';
        const urlNotification = '{{ route('download.notification',1) }}';
        donwloadFile(that, page_url,urlNotification);
    });

    $('#a2').click(function() {
        var that = this;
        const page_url = '{{ route('download.content',2) }}';
        const urlNotification = '{{ route('download.notification',2) }}';
        donwloadFile(that, page_url,urlNotification);
    });

    $('#a3').click(function() {
        var that = this;
        const page_url = '{{ route('download.content',3) }}';
        const urlNotification = '{{ route('download.notification',3) }}';
        donwloadFile(that, page_url,urlNotification);
    });

    $('#a4').click(function() {
        var that = this;
        const page_url = '{{ route('download.content',4) }}';
        const urlNotification = '{{ route('download.notification',4) }}';
        donwloadFile(that, page_url,urlNotification);
    });
</script>
<script src="{{ asset('js/downloadFiles.js') }}"></script>
    
@endsection