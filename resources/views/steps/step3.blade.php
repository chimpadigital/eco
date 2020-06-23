@extends('layouts.site')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-next-step float-right">
                <span>Siguiente paso</span>
            <a href="{{ route('steps') }}" type="submit" class="btn-green-apple">Registrar sesiones <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></a>
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

                            <div id="progress-content-1" class="progress" style="visibility: hidden;">
                                <div id="progress-a1" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>

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

                            <div id="progress-content-2" class="progress" style="visibility: hidden;">
                                <div id="progress-a2" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>

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

                            <div id="progress-content-3" class="progress" style="visibility: hidden;">
                                <div id="progress-a3" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>


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

                            <div id="progress-content-4" class="progress" style="visibility: hidden;">
                                <div id="progress-a4" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                            </div>


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
                <a href="{{ route('steps') }}" type="submit" class="btn-green-apple">Registrar sesiones <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></a>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')

<script type="text/javascript">
    document.getElementById('step3').classList.add("active");

    $('#a1').click(function() {
        $('#a1').css('display','none');

        var that = this;
        const page_url = '{{ route('download.content',1) }}';
        const urlNotification = '{{ route('download.notification',1) }}';
        let elementProgress = $('#progress-a1');
        $('#progress-content-1').css('visibility','visible');
        donwloadFile(that, page_url,urlNotification,elementProgress);
    });

    $('#a2').click(function() {
        $('#a2').css('display','none');
        
        var that = this;
        const page_url = '{{ route('download.content',2) }}';
        const urlNotification = '{{ route('download.notification',2) }}';
        let elementProgress = $('#progress-a2');
        $('#progress-content-2').css('visibility','visible');
        donwloadFile(that, page_url,urlNotification,elementProgress);
    });

    $('#a3').click(function() {
        $('#a3').css('display','none');
        
        var that = this;
        const page_url = '{{ route('download.content',3) }}';
        const urlNotification = '{{ route('download.notification',3) }}';
        let elementProgress = $('#progress-a3');
        $('#progress-content-3').css('visibility','visible');
        donwloadFile(that, page_url,urlNotification,elementProgress);
    });

    $('#a4').click(function() {
        $('#a4').css('display','none');

        var that = this;
        const page_url = '{{ route('download.content',4) }}';
        const urlNotification = '{{ route('download.notification',4) }}';
        let elementProgress = $('#progress-a4');
        $('#progress-content-4').css('visibility','visible');
        donwloadFile(that, page_url,urlNotification,elementProgress);
    });
</script>
<script src="{{ asset('js/downloadFiles.js') }}"></script>
    
@endsection