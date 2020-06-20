<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eco Inclusión - Sesiones de asistencia</title>

    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/lib/bootstrap/css/bootstrap.min.css" />

    <!-- Jalendar CSS -->
    <link
      rel="stylesheet"
      href="{{asset('/')}}assets/lib/jalendar/style/jalendar.css"
      type="text/css"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light custom-bar">
      <div class="container">
        <a class="navbar-brand" href="index.html"
          ><img src="{{asset('/')}}assets/img/logo.svg" width="150" alt="logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Ingresar
                <img src="{{asset('/')}}assets/img/icon-open-account-login.svg" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link icon-nav" href="#"
                >Volver al sitio
                <img src="{{asset('/')}}assets/img/icon-feather-home.svg" />
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Español
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ingles</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div
            class="btn-group btn-group-toggle d-flex custom-btn-group"
            data-toggle="buttons"
          >
            <a
              href="pago-del-manual.html"
              class="btn btn-custom"
              role="button"
              aria-pressed="true"
            >
              <img
                src="{{asset('/')}}assets/img/icon-feather-dollar-sign.svg"
                class="icon"
              />Pago del manual
              <img
                src="{{asset('/')}}assets/img/icon-feather-chevron-down.svg"
                class="icon-arrow"
              />
            </a>
            <a
              href="perfil-replicador.html"
              class="btn btn-custom"
              role="button"
              aria-pressed="true"
            >
              <img src="{{asset('/')}}assets/img/icon-feather-user.svg" class="icon" />Perfil
              replicado
              <img
                src="{{asset('/')}}assets/img/icon-feather-chevron-down.svg"
                class="icon-arrow"
              />
            </a>
            <a
              href="descarga-manual.html"
              class="btn btn-custom"
              role="button"
              aria-pressed="true"
            >
              <img
                src="{{asset('/')}}assets/img/icon-open-data-transfer-download.svg"
                class="icon"
              />Descarga de manual
              <img
                src="{{asset('/')}}assets/img/icon-feather-chevron-down.svg"
                class="icon-arrow"
              />
            </a>
            <a
              href="#"
              class="btn btn-custom active"
              role="button"
              aria-pressed="true"
            >
              <img
                src="{{asset('/')}}assets/img/icon-awesome-comment-dots.svg"
                class="icon"
              />Sesiones de asistencia
              <img
                src="{{asset('/')}}assets/img/icon-feather-chevron-down.svg"
                class="icon-arrow"
              />
            </a>
          </div>
        </div>
      </div>
    </div>

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
            <div
              class="added-event"
              data-type="event"
              data-link="#"
              data-date="19-06-2020"
              data-title="Evento"
            ></div>
            <div
              class="added-event"
              data-type="event"
              data-link="#"
              data-date="17-06-2020"
              data-title="Titulo del evento viejo"
            ></div>
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
            <div
              class="added-event"
              data-type="event"
              data-link="#"
              data-date="19-06-2020"
              data-title="Titulo del evento"
            ></div>
            <div
              class="added-event"
              data-type="event"
              data-link="#"
              data-date="17-06-2020"
              data-title="Titulo del evento viejo"
            ></div>
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
          <button type="submit" class="btn-green-apple">
            Finalizar
            <img src="{{asset('/')}}assets/img/icon-feather-chevron-down-white.svg" />
          </button>
        </div>
      </div>
    </div>

    <script
      type="text/javascript"
      src="http://code.jquery.com/jquery-1.11.3.min.js"
    ></script>
    <!--jQuery-->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha256-ZsWP0vT+akWmvEMkNYgZrPHKU9Ke8nYBPC3dqONp1mY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/es.min.js" integrity="sha256-TaYFETQITAuqJfL0mn0Mxcq6cM1uFvNOC3JcOaCGAs0=" crossorigin="anonymous"></script>
    <script
      type="text/javascript"
      src="{{asset('/')}}assets/lib/jalendar/js/jalendar.js"
    ></script>
    <script type="text/javascript" src="{{asset('/')}}assets/js/custom.js"></script>
  </body>
</html>
