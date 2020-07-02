@extends('layouts.site')

@section('content')

<form action="{{ route('survey.store') }}" method="post">
    @csrf
    <section id="encuesta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box text-center">
                        <h1>@lang('survey.title_1')</h1>
                        <hr>
                        <p>@lang('survey.p_1')</p>
                            <p>@lang('survey.p_2')</p>
                    </div>
                </div>
            </div>
        </div>

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
                                            <select class="custom-select" name="how_did_you_know_manual" required>
                                                <option value="" disabled selected>@lang('survey.input_1.option1')</option>
                                                <option value="1">@lang('survey.input_1.option2')</option>
                                                <option value="2">@lang('survey.input_1.option3')</option>
                                                <option value="3">@lang('survey.input_1.option4')</option>
                                                <option value="4">@lang('survey.input_1.option5')</option>
                                                <option value="5">@lang('survey.input_1.option6')</option>
                                                <option value="6">@lang('survey.input_1.option7')</option>
                                            </select>
                                        </div>

                                        @error('how_did_you_know_manual')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_2')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">@lang('survey.input_2.option1')</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">@lang('survey.input_2.option2')</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio3" value="3">
                                            <label class="form-check-label" for="inlineRadio3">@lang('survey.input_2.option3')</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio4" value="4">
                                            <label class="form-check-label" for="inlineRadio4">@lang('survey.input_2.option4')</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio5" value="5">
                                            <label class="form-check-label" for="inlineRadio5">@lang('survey.input_2.option5')</label>
                                        </div>

                                        @error('process_download')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_3')</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="virtual_assists_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">@lang('survey.yes')</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="virtual_assists_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">@lang('survey.no')</label>
                                            </div>

                                            @error('virtual_assists_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="virtual_assists" placeholder="@lang('survey.input_3')">
                                            </div>

                                            @error('virtual_assists')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_4')</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="call_time_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">@lang('survey.yes')</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="call_time_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">@lang('survey.no')</label>
                                            </div>

                                            @error('call_time_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="call_time" placeholder="@lang('survey.input_4')">
                                            </div>

                                            @error('call_time')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_5')</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="quality_advice_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">@lang('survey.yes')</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="quality_advice_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">@lang('survey.no')</label>
                                            </div>

                                            @error('quality_advice_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="quality_advice" placeholder="@lang('survey.input_5')">
                                            </div>

                                            @error('quality_advice')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_6')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="attention" required>
                                                <option value="" disabled selected>@lang('survey.input_6.option1')</option>
                                                <option value="1">@lang('survey.input_6.option2')</option>
                                                <option value="2">@lang('survey.input_6.option3')</option>
                                                <option value="3">@lang('survey.input_6.option4')</option>
                                                <option value="4">@lang('survey.input_6.option5')</option>
                                            </select>

                                            @error('attention')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <textarea class="form-control input-custom" name="suggestions" placeholder="@lang('survey.input_7')"></textarea>
                                        </div>
                                        @error('suggestions')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            <select class="custom-select" name="content_option_1" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            @error('content_option_1')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_8')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_2" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            
                                            @error('content_option_2')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_9')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_3" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            
                                            @error('content_option_3')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_10')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_4" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            
                                            @error('content_option_4')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_11')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_5" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            
                                            @error('content_option_5')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_12')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_6" required>
                                                <option value="" disabled selected>@lang('survey.input_8.option1')</option>
                                                <option value="1">@lang('survey.input_8.option2')</option>
                                                <option value="2">@lang('survey.input_8.option3')</option>
                                                <option value="3">@lang('survey.input_8.option4')</option>
                                                <option value="4">@lang('survey.input_8.option5')</option>
                                                <option value="5">@lang('survey.input_8.option6')</option>
                                            </select>
                                            
                                            @error('content_option_6')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_1" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_1" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_1" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_1" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_1" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_1')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>@lang('survey.label_14')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_2" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_2" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_2" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_2" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_2" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_2')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>@lang('survey.label_15')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_3" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_3" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_3" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_3" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_3" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_3')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>@lang('survey.label_16')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_4" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_4" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_4" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_4" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_4" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_4')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>@lang('survey.label_17')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_5" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_5" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_5" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_5" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_5" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_5')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>@lang('survey.label_18')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_6" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_6" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_6" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_6" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_6" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_6')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <p>@lang('survey.label_19')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_7" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_7" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_7" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_7" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_7" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>

                                        @error('chapter_7')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <p>@lang('survey.label_20')</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_8" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_8" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_8" id="inlineRadio2" value="3">
                                            <label class="form-check-label" for="inlineRadio2">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_8" id="inlineRadio2" value="4">
                                            <label class="form-check-label" for="inlineRadio2">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="chapter_8" id="inlineRadio2" value="5">
                                            <label class="form-check-label" for="inlineRadio2">5</label>
                                        </div>
                                        @error('chapter_8')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            <select class="custom-select" name="satisfied" required>
                                                <option value="" disabled selected>@lang('survey.input_9.option1')</option>
                                                <option value="1">@lang('survey.input_9.option2')</option>
                                                <option value="2">@lang('survey.input_9.option3')</option>
                                                <option value="3">@lang('survey.input_9.option4')</option>
                                                <option value="4">@lang('survey.input_9.option5')</option>
                                                <option value="5">@lang('survey.input_9.option6')</option>
                                            </select>
                                            @error('satisfied')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>@lang('survey.label_22')</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="suggestions_2" required>
                                                <option value="" disabled selected>@lang('survey.input_10.option1')</option>
                                                <option value="1">@lang('survey.input_10.option2')</option>
                                                <option value="2">@lang('survey.input_10.option3')</option>
                                                <option value="3">@lang('survey.input_10.option4')</option>
                                                <option value="4">@lang('survey.input_10.option5')</option>
                                                <option value="5">@lang('survey.input_10.option6')</option>
                                            </select>
                                            @error('suggestions_2')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control input-custom" name="would_you_recommend" placeholder="@lang('survey.input_7')"></textarea>
                                            @error('would_you_recommend')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control input-custom" name="like" placeholder="@lang('survey.input_11')"></textarea>
                                            @error('like')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-green-apple">@lang('survey.button') <img src="assets/img/icon-feather-chevron-left.png"></button>
                </div>
            </div>
        </section>
    </section>

    </form>

@endsection
