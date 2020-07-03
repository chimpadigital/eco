@extends('layouts.site')


@section('content')
@include('steps.modal')
@include('steps.step_bar')

<div class="container d-lg-block d-none">
    <div class="row">
        <div class="col-md-12">
            <div class="box-next-step float-right">
                <span>@lang('download.p_2')</span>
                <a href="{{ route('steps') }}" class="btn-green-apple next-step">@lang('download.button_1')<img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></a>
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
                    <img src="{{ asset('site_') }}assets/img/icon-download.svg" alt="">
                </div>
                <h1>@lang('download.title_1')</h1>
                <p>@lang('download.p_1')</p>
            </div>
        </div>
    </div>
</div>

<section id="download-files">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="icon-download">
                                <img src="{{ asset('site_assets/img/icon-feather-book.svg') }}">
                            </div>
    
                            @if ($downloadControl->element_1)
    
                                <img class="check-download" src="assets/img/icon-check-download.svg">
    
                            @else
    

                                <a id="a1" data-filename="manual.pdf" class="service btn btn-download">@lang('download.download1')

                            
                                    <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                            
                                </a>
    
                            @endif
                            
                            <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                            
                            <div id="progress-content-1" class="progress" style="visibility: hidden;">
                            
                                <div id="progress-a1" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            
                            </div>

                        </div>
                        
                        <div class="col-md-3 text-center">
                        
                            <div class="icon-download">
                        
                                <img src="{{ asset('site_assets/img/icon-feather-video.svg') }}">
                        
                            </div>
    
                            @if ($downloadControl->element_2)
    
                                <img class="check-download" src="assets/img/icon-check-download.svg">
    
                            @else
    
                                <a id="a2" data-filename="video.mp4" class="service btn btn-download">@lang('download.download2')
                            
                                    <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                            
                                </a>
    
                            @endif
                        
                            
                            <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                            
                            <div id="progress-content-2" class="progress" style="visibility: hidden;">
                                
                                <div id="progress-a2" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            
                            </div>

                        </div>
                        
                        <div class="col-md-3 text-center">
                        
                            <div class="icon-download">
                        
                                <img src="{{ asset('site_assets/img/icon-awesome-question.svg') }}">
                        
                            </div>
    
                            @if ($downloadControl->element_3)
    
                                <img class="check-download" src="assets/img/icon-check-download.svg">
    
                            @else
    
                                <a id="a3" data-filename="preguntas_questions.pdf" class="service btn btn-download">@lang('download.download3')
                            
                                    <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                            
                                </a>
    
    
                            @endif
                        
                            <img class="arrow-green" src="assets/img/Icon-feather-chevron-green.svg">
                            
                            <div id="progress-content-3" class="progress" style="visibility: hidden;">
                                
                                <div id="progress-a3" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            
                            </div>
                        
                        </div>
                        
                        <div class="col-md-3 text-center">
                        
                            <div class="icon-download">
                        
                                <img src="{{ asset('site_assets/img/icon-feather-file-plus.svg') }}">
                        
                            </div>
    
                            @if ($downloadControl->element_4)
    
                                <img class="check-download" src="assets/img/icon-check-download.svg">
    
                            @else
    
                                <a id="a4" data-filename="anexos.zip" class="service btn btn-download">@lang('download.download4')
                        
                                    <img src="{{ asset('site_assets/img/icon-download-interface.svg') }}">
                            
                                </a>
    
                            @endif
                            
                            <div id="progress-content-4" class="progress" style="visibility: hidden;">
                                
                                <div id="progress-a4" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                            
                            </div>
                            
                        
                        </div>
                    
                    </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>


</section>


<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="box-next-step float-right">
                <span>@lang('download.p_2')</span>
                <a href="{{ route('steps') }}" class="btn-green-apple next-step">@lang('download.button_1') <img src="{{ asset('site_') }}assets/img/icon-feather-chevron-down-white.svg"></a>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')

<script type="text/javascript">

    $('.service').click(function(e) {
        e.preventDefault();
    });

    $('.step1').addClass("visited");
    $('.step2').addClass("visited");
    $('.paso-mobile').text("{{ __('layout.nav_bar_steps.step3') }}");
    $('.step3').addClass("active");

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

    const URL_VERIFICATION_STEP = "{{ route('step.verify',3) }}";
    const title_2 = "{{ __('download.title_2') }}";
    const p_3 = "{{ __('download.p_3') }}";
</script>
<script src="{{ asset('js/downloadFiles.js') }}"></script>
    
@endsection