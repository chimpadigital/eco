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
              <img src="{{asset('/')}}assets/img/icon-professions-and-jobs.svg" />
            </div>
            <h1>@lang('quote.title_1')</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="box-reservation">
            <p>
              @lang('quote.p_1')
            </p>
          </div>
        </div>
      </div>
    </div>

    <section id="calendar">

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <div class="jalendar-title">
              <h1>1{{__('quote.st')}}</h1>
              <h2>@lang('quote.session')</h2>
              <p>@lang('quote.p_2')</p>
            </div>
            
            <div id="Calendar-1" class="jalendar">
              @foreach ($reservas as $item)
              <div
              class="added-event"
              data-type="event"
              data-link="#"
              data-date="{{isset($item->first_session) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->first_session)->format('d-m-Y'):''}}"
              data-title="Evento"
            ></div>
              @endforeach
            </div>
            <div class="jalendar-extended">
              <div class="row">
                <div class="col-md-4 col-4">
                  <div class="jalendar-date">
                    <p>@lang('quote.title_2')</p>
                    <p ><span id="dia"></span> de <span id="mes"></span></p>
                  </div>
                </div>
                <div class="col-md-4 col-8 p-lg-0">
                  <div class="jalendar-hour">
                    <p>@lang('quote.p_3')</p>
                    <select id="first_sesion_time" class="custom-select input-custom">
                      <option selected value="10:00">10:00 am</option>
                      <option value="11:00">11:00 am</option>
                      <option value="12:00">12:00 pm</option>
                      <option value="13:00">13:00 pm</option>
                      <option value="14:00">14:00 pm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 align-self-end">
                  <button type="button" id="guardar_reserva_1" class="btn-green-apple">
                    @lang('quote.btn_1')
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="jalendar-title">
              <h1>2{{__('quote.nd')}}</h1>
              <h2>@lang('quote.session')</h2>
              <p>@lang('quote.p_2')</p>
            </div>
            <div id="Calendar-2" class="jalendar">
              @foreach ($reservas as $item)
                <div
                class="added-event"
                data-type="event"
                data-link="#"
  
                data-date="{{isset($item->second_session)?Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->second_session)->format('d-m-Y'):''}}"
  
                data-title="Evento"
              ></div>
              @endforeach
            </div>
            <div class="jalendar-extended">
              <div class="row">
                <div class="col-md-4 col-4">
                  <div class="jalendar-date">
                    <p>@lang('quote.title_2')</p>
                    <p ><span id="dia2"></span> de <span id="mes2"></span></p>
                  </div>
                </div>
                <div class="col-md-4 col-8 p-lg-0">
                  <div class="jalendar-hour">
                    <p>@lang('quote.p_3')</p>
                    <select id="second_sesion_time" class="custom-select input-custom">
                      <option selected value="10:00">10:00 am</option>
                      <option value="11:00">11:00 am</option>
                      <option value="12:00">12:00 pm</option>
                      <option value="13:00">13:00 pm</option>
                      <option value="14:00">14:00 pm</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 align-self-end">
                  <button type="button" id="guardar_reserva_2" class="btn-green-apple">
                    @lang('quote.btn_1')
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5 mt-5">
            <button type="button" id="finalizarReserva" class="btn-green-apple">
              @lang('quote.btn_2')
              <img src="{{asset('/')}}assets/img/icon-feather-chevron-down-white.svg" />
  
            </button>
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
    $('.step4').addClass("active");
    $('.paso-mobile').text("{{ __('layout.nav_bar_steps.step4') }}");
  
      </script>
      
    @endsection

   
