
<section id="first-form">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="form">
                    <h2>@lang('survey.title_2')</h2>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_1')</p>
                            <div class="form-group mb-4">
                                @lang('survey.input_1.option'.$survey->how_did_you_know_manual)
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_2')</p>
                            @lang('survey.input_2.option'.$survey->process_download)

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_3')</p>
                            <div class="form-row radio-input mb-4">

                                @if($survey->virtual_assists_boolean)
                                    
                                    @lang('survey.yes')

                                @else

                                    @lang('survey.no')

                                @endif


                                <div class="form-group flex-fill">
                                    <p>@lang('survey.input_3')</p>
                                    {{ $survey->virtual_assists }}
                                </div>

                                
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_4')</p>
                            <div class="form-row radio-input mb-4">

                                @if($survey->call_time_boolean)
                                    
                                    @lang('survey.yes')

                                @else

                                    @lang('survey.no')

                                @endif

                                <div class="form-group flex-fill">
                                    <p>@lang('survey.input_4')</p>
                                    {{ $survey->call_time }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_5')</p>
                            <div class="form-row radio-input mb-4">
                               
                                @if($survey->quality_advice_boolean)
                                    
                                    @lang('survey.yes')

                                @else

                                    @lang('survey.no')

                                @endif


                                <div class="form-group flex-fill">
                                    <p>@lang('survey.input_5')</p>
                                    {{ $survey->quality_advice }}
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>@lang('survey.label_6')</p>
                            <div class="form-group">

                                @lang('survey.input_6.option'.$survey->attention)

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <p>@lang('survey.input_7'): {{ $survey->suggestions }}</p>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</section>

<section id="second-form">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="form">
                    <h2>@lang('survey.title_3')</h2>
                    <hr>
            
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_7')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_1)
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_8')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_2)
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_9')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_3)
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_10')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_4)
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_11')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_5)
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_12')</p>
                                <div class="form-group">
                                    @lang('survey.input_8.option'.$survey->content_option_6)
                                    
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section id="third-form">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="form">
                    <h2>@lang('survey.title_4')</h2>
                    <hr>
                    <p class="subtitle">@lang('survey.p_3')</p>
                    
                        <div class="row">
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_13')</p>
                                {{ $survey->chapter_1 }}


                            </div>
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_14')</p>
                                {{ $survey->chapter_2 }}

                            </div>
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_15')</p>
                                {{ $survey->chapter_3 }}

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_16')</p>
                                {{ $survey->chapter_4 }}

                            </div>
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_17')</p>
                                {{ $survey->chapter_5 }}

                            </div>
                            <div class="col-sm-12 col-md-4 mb-4">
                                <p>@lang('survey.label_18')</p>
                                {{ $survey->chapter_6 }}

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-4">
                                <p>@lang('survey.label_19')</p>
                                {{ $survey->chapter_7 }}

                            </div>
                            <div class="col-sm-12 col-md-6 mb-4">
                                <p>@lang('survey.label_20')</p>
                                {{ $survey->chapter_8 }}
                            </div>
                        </div>
                        
                        
                
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fourth-form">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="form">
                    <h2>@lang('survey.title_5')</h2>
                    <hr>
                    
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_21')</p>
                                <div class="form-group">
                                    @lang('survey.input_9.option'.$survey->satisfied)
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>@lang('survey.label_22')</p>
                                <div class="form-group">
                                    @lang('survey.input_10.option'.$survey->would_you_recommend)
                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <p>@lang('survey.input_7'):{{ $survey->suggestions_2 }}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <p>@lang('survey.input_11'):{{ $survey->like }}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
