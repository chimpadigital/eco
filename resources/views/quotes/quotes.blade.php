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
            <h1>RESERVAR DÍA Y HORA</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="box-reservation">
            <p>
              Al momento de reservar las asistencias virtuales, por favor tener
              en consideración que los horarios que figuran disponibles
              corresponden a la zona horaria Argentina (ART), UTC-3.
              Recomendamos revisar previamente la compatibilidad horaria con la
              localidad donde te encuentras!
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6">
          <div class="jalendar-title">
            <h1>1ra</h1>
            <h2>Sesión</h2>
            <p>de asistencia virtual</p>
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
              <div class="col-md-4">
                <div class="jalendar-date">
                  <p>Reservar</p>
                  <p ><span id="dia"></span> de <span id="mes"></span></p>
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="jalendar-hour">
                  <p>Horarios disponibles</p>
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
                  Reservar sesión
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="jalendar-title">
            <h1>2da</h1>
            <h2>Sesión</h2>
            <p>de asistencia virtual</p>
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
              <div class="col-md-4">
                <div class="jalendar-date">
                  <p>Reservar</p>
                  <p ><span id="dia2"></span> de <span id="mes2"></span></p>
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="jalendar-hour">
                  <p>Horarios disponibles</p>
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
                  Reservar sesión
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-5 mt-5">
          <button type="button" id="finalizarReserva" class="btn-green-apple">
            Finalizar
            <img src="{{asset('/')}}assets/img/icon-feather-chevron-down-white.svg" />

          </button>
        </div>
      </div>
    </div>
    @endsection

    @section('scripts')
        
    <script type="text/javascript">

    $('.step1').addClass("visited");
    $('.step2').addClass("visited");
    $('.step3').addClass("visited");
    $('.step4').addClass("active");
    $('.paso-mobile').text("Sesiones de asistencia");
  
      </script>
      
    @endsection

   
