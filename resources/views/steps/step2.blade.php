@extends('layouts.site')


@section('content')
@include('steps.modal')
@include('steps.step_bar')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="banner">
                <div class="back"></div>
                <div class="icon-banner">
                    <img src="{{ asset('assets/img/icon-check-pago.svg') }}">
                </div>
                <h1>@lang('payment.payment_ok')</h1>
            </div>
        </div>
    </div>
</div>
<section id="form-perfil-replicador">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-meet">
                    <p>@lang('profile.p_1')</p>
                    <h2>@lang('profile.title_1')</h2>
                    <p>@lang('profile.p_2')</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8 mb-5">
                <div class="form-meet">
                    <p><img src="{{ asset('site_assets/img/icon-users.svg') }}">@lang('profile.form_section_1')</p>
                    <form method="POST" action="{{ route('inscription.form') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-custom" value="{{ $user->name }}" name="firstname" placeholder="@lang('profile.form.input_1')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-custom" value="{{ $user->lastname }}" name="lastname" placeholder="@lang('profile.form.input_2')" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control input-custom" name="email" value="{{ $user->email }}" placeholder="@lang('profile.form.input_3')" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="date" class="d-lg-none" style="margin-top:30px; margin-bottom:12px">@lang('profile.form.input_4')</label>
                                    <input type="date" class="form-control input-custom" name="birth_date" value="{{ old('birth_date') }}" placeholder="@lang('profile.form.input_4')" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                <input type="text" class="form-control input-custom" name="city" placeholder="@lang('profile.form.input_5')" value="{{ old('city') ? old('city') : $user->city  }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-4">
                                <select class="custom-select" name="country_id" required>
                                    <option selected disabled>@lang('profile.form.input_6')</option>
                                    
                                    @forelse ($countries as $country)
                                    
                                        <option {{ $country->id == $user->country_id ? "selected" : "" }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    
                                    @empty
                                        
                                    @endforelse
                                    
                                </select>
                            </div>
                        </div>
                    
                        <p><img src="{{ asset('site_assets/img/icon-bag.svg') }}">@lang('profile.form_section_2')</p>
                    
                        <div class="form-group mb-4">
                            <select class="custom-select" name="occupation">
                                <option selected>@lang('profile.form.input_7.option0')</option>
                                <option value="estudiante">@lang('profile.form.input_7.option1')</option>
                                <option value="emprendedor">@lang('profile.form.input_7.option2')</option>
                                <option value="profesional autónomo">@lang('profile.form.input_7.option3')</option>
                                <option value="docente">@lang('profile.form.input_7.option4')</option>
                                <option value="representante de una organización">@lang('profile.form.input_7.option5')</option>
                                <option value="miembro de una empresa">@lang('profile.form.input_7.option6')</option>
                                <option value="miembro del estado">@lang('profile.form.input_7.option7')</option>
                                <option value="otro (s)">@lang('profile.form.input_7.option8')</option>
                            </select>
                        </div>
                    
                        <p><img src="{{ asset("site_assets/img/icon-cursor.svg") }}">@lang('profile.form_section_3')</p>
                
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
                            <input type="text" class="form-control input-custom" name="others" value="{{ old('others') }}" placeholder="@lang('profile.form.input_11')">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom" name="motivation" placeholder="@lang('profile.form.input_12')">{{ old('question1') }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-custom" name="did_you_know_foundation" placeholder="@lang('profile.form.input_13')">{{ old('question_2') }}</textarea>
                        </div>

                        <div class="center-mobile">

                            <small>@lang('profile.form.input_14')</small>
                            
                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ong" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">@lang('profile.form.yes')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ong" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">@lang('profile.form.no')</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom" name="name_ogn" value="{{old('name_ogn')}}" placeholder="@lang('profile.form.input_15')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom" name="web_page" value="{{old('web_page')}}" placeholder="@lang('profile.form.input_16')">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-custom"  name="allies_to_implement" placeholder="@lang('profile.form.input_17')">{{old('allies_to_implement')}}</textarea>
                            </div>
                
                            <small>@lang('profile.form.input_18')</small>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="implementation_ant" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">@lang('profile.form.yes')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="implementation_ant" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">@lang('profile.form.no')</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-custom"  name="impact_class" placeholder="@lang('profile.form.input_19')">{{old('question_8')}}</textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-custom" name="extra_information" placeholder="@lang('profile.form.input_20')">{{old('question_9')}}</textarea>
                            </div>
                            <button type="submit" class="btn-green-apple">

                                <span class="d-none d-lg-inline-flex">@lang('profile.form.btn')</span>

                                <img src="{{ asset('site_assets/img/icon-feather-chevron-down-white.svg') }}"></button>
                        </div>
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
    $('.paso-mobile').text("{{ __('layout.nav_bar_steps.step2') }}");
</script>
    
@endsection