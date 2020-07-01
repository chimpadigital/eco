@extends('layouts.site')

@section('content')

<form action="{{ route('survey.store') }}" method="post">
    @csrf
    <section id="encuesta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box text-center">
                        <h1>ENCUESTA DE SATISFACCIÓN</h1>
                        <hr>
                        <p>Esta encuesta nos sirve para valorar el servicio del Manual de Réplica de Fundación Ecoinclusión y 
                            tu experiencia como usuario después de haber adquirido dichas herramientas. Para nosotros es muy 
                            importante conocer tu opinión.</p>
                            <p>¡Muchas gracias!</p>
                    </div>
                </div>
            </div>
        </div>

        <section id="first-form">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="form">
                            <h2>SOBRE EL MANUAL Y LAS ASISTENCIAS</h2>
                            <hr>
                            
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Cómo conociste o te enteraste del Manual de Réplica?</p>
                                        <div class="form-group mb-4">
                                            <select class="custom-select" name="how_did_you_know_manual" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Mailing.</option>
                                                <option value="2">Newsletter.</option>
                                                <option value="3">Redes Sociales (Facebook, Instagram, etc).</option>
                                                <option value="4">Sitio Web de la Fundación.</option>
                                                <option value="5">Amig@s o familiares. </option>
                                                <option value="6">Otros (indicar)</option>
                                            </select>
                                        </div>

                                        @error('how_did_you_know_manual')
                                            <span class="invalid-feedback" role="alert" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Cómo te resultó el proceso de descarga? Puedes elegir varias opciones</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label" for="inlineRadio1">Fácil</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">Rápido</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio3" value="3">
                                            <label class="form-check-label" for="inlineRadio3">Dificultoso</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio4" value="4">
                                            <label class="form-check-label" for="inlineRadio4">Lento</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radio-custom" type="radio" name="process_download" id="inlineRadio5" value="5">
                                            <label class="form-check-label" for="inlineRadio5">No tengo comentarios</label>
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
                                        <p>¿Utilizaste dos asistencias virtuales?</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="virtual_assists_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="virtual_assists_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>

                                            @error('virtual_assists_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="virtual_assists" placeholder="¿Por qué no?">
                                            </div>

                                            @error('virtual_assists')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Fue útil el tiempo de la llamada?</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="call_time_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="call_time_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>

                                            @error('call_time_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="call_time" placeholder="¿Por qué no?">
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
                                        <p>¿El asesoramiento fue de calidad, es decir, sirvió para evacuar dudas?</p>
                                        <div class="form-row radio-input mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="quality_advice_boolean" id="inlineRadio1" value="1" required>
                                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input radio-custom" type="radio" name="quality_advice_boolean" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>

                                            @error('quality_advice_boolean')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group flex-fill">
                                                <input type="text" class="form-control input-custom w-100" name="quality_advice" placeholder="¿Por qué no?">
                                            </div>

                                            @error('quality_advice')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Cómo fue la atención para resolver tus dudas?</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="attention" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Rápida, pues contestaron dentro de las 72 hs.</option>
                                                <option value="2">Tuve que esperar algunos días, pero contestaron.</option>
                                                <option value="3">Lenta, no me contestaron hasta pasada una semana hábil.</option>
                                                <option value="4">Insuficiente, pues no recibí respuesta.</option>
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
                                            <textarea class="form-control input-custom" name="suggestions" placeholder="Sugerencias"></textarea>
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
                            <h2>SOBRE EL CONTENIDO</h2>
                            <hr>
                    
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>La lectura del Manual fue sencilla y dinámica, los capítulos están integrados entre sí:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_1" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
                                            </select>
                                            @error('content_option_1')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <p>Los objetivos están claramente definidos:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_2" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
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
                                        <p>Se describe en detalle la composición y fabricación del producto final
                                            (Eco-ladrillo) del proyecto:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_3" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
                                            </select>
                                            
                                            @error('content_option_3')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>Se observa una clara relación entre las actividades a
                                            desarrollar en el proyecto:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_4" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
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
                                        <p>Se detallan todos los pasos a seguir y la secuencia temporal
                                            es detallada, coherente y factible:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_5" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
                                            </select>
                                            
                                            @error('content_option_5')
                                               <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>Se utiliza información y materiales suficientes para hacer del proyecto
                                            comprensible y significativo:</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="content_option_6" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Totalmente de acuerdo.</option>
                                                <option value="2">De acuerdo.</option>
                                                <option value="3">Ni de acuerdo ni en desacuerdo.</option>
                                                <option value="4">En desacuerdo.</option>
                                                <option value="5">Totalmente en desacuerdo.</option>
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
                            <h2>VALORACIÓN POR CAPÍTULOS</h2>
                            <hr>
                            <p class="subtitle">(1 es poco satisfecho, 5 muy satisfecho)</p>
                            
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <p>Capítulo 1: “Introducción - Prólogo”:</p>
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
                                        <p>Capítulo 2: “Objetivos del Manual”:</p>
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
                                        <p>Capítulo 3: “Usos y lineamientos”:</p>
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
                                        <p>Capítulo 4: “Sobre Fundación Ecoinclusión”:</p>
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
                                        <p>Capítulo 5: “Proceso”:</p>
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
                                        <p>Capítulo 6: “Sistema Constructivo”:</p>
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
                                        <p>Capítulo 7: “Tu proyecto. Técnica de Gestión de proyectos de desarrollo”:</p>
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
                                        <p>Capítulo 8: “Conclusiones y recomendaciones”:</p>
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
                            <h2>VALORACIÓN PERSONAL</h2>
                            <hr>
                            
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Cómo estás de satisfecho/a con el Manual?</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="satisfied" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Muy satisfecho/a.</option>
                                                <option value="2">Satisfecho/a.</option>
                                                <option value="3">Normal.</option>
                                                <option value="4">Insatisfecho/a.</option>
                                                <option value="5">Muy insatisfecho/a.</option>
                                            </select>
                                            @error('satisfied')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>¿Recomendarías el Manual a otras personas?</p>
                                        <div class="form-group">
                                            <select class="custom-select" name="suggestions_2" required>
                                                <option value="" disabled selected>Elegir opción</option>
                                                <option value="1">Definitivamente si.</option>
                                                <option value="2">Probablemente si.</option>
                                                <option value="3">No lo sé.</option>
                                                <option value="4">Probablemente no.</option>
                                                <option value="5">Seguramente no.</option>
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
                                            <textarea class="form-control input-custom" name="would_you_recommend" placeholder="Sugerencias"></textarea>
                                            @error('would_you_recommend')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control input-custom" name="like" placeholder="¿Qué fue lo que más te gustó del Manual?"></textarea>
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
                    <button type="submit" class="btn-green-apple">Enviar <img src="assets/img/icon-feather-chevron-left.png"></button>
                </div>
            </div>
        </section>
    </section>

    </form>

@endsection
