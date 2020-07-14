<template>
  <div class="perfil">
    <!-- Información Perfil -->
    <div class="card text-left">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col-12 col-sm-6 col-md-3 d-flex flex-column order-lg-1 order-2">
            <div class="icon">
              <img src="/assets/img/replicadores.svg" class="mb-3" alt="">
            </div>
            <h4
              class="card-title"
            >Perfil de: {{ data.inforPerfil.nombre+' '+data.inforPerfil.apellido }}</h4>
          </div>
          <div class="col-12 col-sm-6 col-md-2 d-flex justify-content-end align-items-end order-lg-2 order-1">
            <a href="/admin/users" class="btn btn-success"><img src="/assets/img/back.svg" class="mr-1" alt="">Volver</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-1 mb-4">
            <label for="pago">Pago</label>
            <input
              v-model="data.procesoSesion.pago"
              class="form-control"
              type="checkbox"
              name="pago"
              id="pago"
            />
          </div>
          <div class="col-12 col-sm-6 col-md-1 mb-4">
            <label for="descargas">Descargas</label>
            <input
              v-model="data.procesoSesion.descargar"
              class="form-control"
              type="checkbox"
              name="descargas"
              id="descargas"
            />
          </div>
          <div class="col-12 col-sm-6 col-md-2 d-flex align-items-end mb-4">
            <div class="input-fecha" style="margin-right:2px;">
              <label for="primer_sesion">Primer Sesión</label>
              <p style="width: 154px;" class="fechas">{{data.procesoSesion.primerSesionFecha}}</p>
              <!-- <input
              class="form-control"
              :value="data.procesoSesion.primerSesionFecha"
              @change.prevent="asistenciaFirstSesion()"
              type="date"
              name="primer_sesion"
              id="primer_sesion"
              />-->
            </div>
            <input
              class="form-control"
              v-model="data.procesoSesion.primerSesion"
              type="checkbox"
              name="descargas"
              id="descargas"
            />
          </div>

          <div class="col-12 col-sm-6 col-md-2 d-flex align-items-end mb-4">
            <div class="input-fecha" style="margin-right:2px;">
              <label for="segunda_sesion">Segunda Sesión</label>
              <p style="width: 154px;" class="fechas">{{data.procesoSesion.segunSesionFecha}}</p>

              <!-- <input
              class="form-control"
              :value="data.procesoSesion.segunSesionFecha"
              type="date"
              name="segunda_sesion"
              id="segunda_sesion"
              />-->
            </div>
            <input
              class="form-control"
              v-model="data.procesoSesion.segunSesion"
              type="checkbox"
              name="descargas"
              id="descargas"
            />
          </div>

          <div class="col-12 col-sm-6 col-md-2 mb-4">
            <label for="condiciones_uso">Condiciones Generales de Uso</label>
            <input
              class="form-control"
              v-model="data.procesoSesion.condicionesGenerales"
              type="checkbox"
              name="condiciones_uso"
              id="condiciones_uso"
            />
          </div>
          <div class="col-12 col-sm-6 col-md-2 mb-4">
            <label for="acuerdo_confidencialidad">Acuerdo de Confidencialidad</label>
            <input
              class="form-control"
              v-model="data.procesoSesion.acuerdoConfidencialidad"
              type="checkbox"
              name="acuerdo_confidencialidad"
              id="acuerdo_confidencialidad"
            />
          </div>
          <div class="col-12 col-sm-6 col-md-2">
            <label for="cupon_descuento">Cupón Descuento</label>
            <!-- <input class="form-control" type="text" name="cupon_descuento" id="cupon_descuento" /> -->
            <p class="fechas">{{data.procesoSesion.cupon}}</p>
          </div>
          <div class="col-12 col-sm-6 col-md-2 mt-4">
            <label for="cupon_descuento">Metodo de pago</label>
            <!-- <input class="form-control" type="text" name="cupon_descuento" id="cupon_descuento" /> -->
            <p>{{data.procesoSesion.method}}</p>
          </div>
          <div class="col-12 col-sm-6 col-md-3 mt-4">
            <label for="cupon_descuento">Referencia</label>
            <!-- <input class="form-control" type="text" name="cupon_descuento" id="cupon_descuento" /> -->
            <p>{{data.procesoSesion.ref}}</p>
          </div>
          <div class="col-12">
            <div class="divider"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <form action="#">
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Nombre</label>
                  <input v-model="data.inforPerfil.nombre" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Apellido</label>
                  <input v-model="data.inforPerfil.apellido" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Email</label>
                  <input v-model="data.inforPerfil.email" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Telefono</label>
                  <input v-model="data.inforPerfil.telefono" type="text" class="form-control" />
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Fecha de Nacimiento</label>
                  <input
                    v-model="data.inforPerfil.fechaNacimiento"
                    type="date"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Ciudad de Residencia</label>
                  <input v-model="data.inforPerfil.ciudad" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Pais</label>
                  <select v-model="data.inforPerfil.pais" type="text" class="form-control">
                    <option
                      v-for="(country, i) in countries"
                      :key="i"
                      :value="country.id"
                    >{{ country.name }}</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Ocupacion</label>
                  <input v-model="data.inforPerfil.ocupacion" type="text" class="form-control" />
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>Redes Sociales</label>
                  <input
                    v-model="data.redes.facebook"
                    type="text"
                    class="form-control"
                    placeholder="Facebook"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-end">
                  <!-- <label for="">Apellido</label> -->
                  <input
                    v-model="data.redes.linkedin"
                    type="text"
                    class="form-control"
                    placeholder="Linkedin"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-end">
                  <!-- <label for="">Email</label> -->
                  <input
                    v-model="data.redes.instagram"
                    type="text"
                    class="form-control"
                    placeholder="Instagram"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-end">
                  <!-- <label for="">Telefono</label> -->
                  <input
                    v-model="data.redes.otras"
                    type="text"
                    class="form-control"
                    placeholder="Otras"
                  />
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-">
                  <label for>
                    ¿Por qué estas interesado en frabricar
                    eco-ladrillos? ¿Cual es tu Motivación?
                  </label>
                  <input
                    v-model="data.sobreFundacion.motivacion"
                    type="text"
                    class="form-control"
                    placeholder
                  />
                </div>
                <div class="col-12 col-sm-6 col-md- justify-content-end">
                  <label for>¿Ya conocías a la fundación previamente?</label>
                  <input
                    v-model="
                                        data.sobreFundacion.conociasFundacion
                                    "
                    type="text"
                    class="form-control"
                    placeholder
                  />
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label>Pertenece a una ONG</label>
                  <div class="group-inputs d-flex flex-row align-items-center">
                    <span
                      style="cursor:pointer"
                      v-if="data.otraInfo.ong"
                      class="mr-1 si-no"
                      @click.prevent="changeOng"
                    >SI</span>
                    <span style="cursor:pointer" v-else class="mr-1" @click.prevent="changeOng">NO</span>
                    <input v-model="data.otraInfo.nombreOgn" type="text" class="form-control" />
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label>Tienes página web?</label>
                  <input v-model="data.otraInfo.paginaWeb" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label>
                    Tienes aliados para implementar este
                    proyecto?
                  </label>
                  <input
                    v-model="
                                        data.otraInfo.aliadosParaImplementar
                                    "
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label>Implementación anterior de proyectos</label>
                  <div class="group-inputs d-flex flex-row align-items-center">
                    <span
                      style="cursor:pointer"
                      v-if="data.otraInfo.ImplementacionAnt"
                      class="mr-1 si-no"
                      @click.prevent="changeImplementacion"
                    >SI</span>
                    <span
                      style="cursor:pointer"
                      v-else
                      class="mr-1"
                      @click.prevent="changeImplementacion"
                    >NO</span>

                    <input
                      v-model="
                                            data.otraInfo.ImplementacionName
                                        "
                      type="text"
                      class="form-control"
                    />
                  </div>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6">
                  <label for>¿De qué tipo? ¿Qué clase de impacto tuvo?</label>
                  <input v-model="data.cladeDeInpacto" type="text" class="form-control" placeholder />
                </div>
                <div class="col-12 col-sm-6">
                  <label for>información Extra</label>
                  <input
                    v-model="data.informacionExtra"
                    type="text"
                    class="form-control"
                    placeholder
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-success" @click.prevent="guardar" type="button">Guardar <img src="/assets/img/save.svg" alt=""></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <notifications group="userInforSave" />
    </div>
    <!-- Información encuesta -->
    <div class="card text-left">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col-12 col-sm-6 col-md-3 d-flex flex-column">
            <h4 class="card-title">Encuesta</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <form action="#">
              <div class="row">
                <div class="col-12">
                  <h6>Sobre el manual y la asistencia</h6>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>¿Cómo conociste o te enteraste del Manual de Réplica?</label>
                  <input
                    v-model="data.encuestaUser.how_did_you_know_manual"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for>¿Cómo te resultó el proceso de descarga?</label>
                  <input
                    v-model="data.encuestaUser.process_download"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3 justify-content-end">
                  <label for>¿Utilizaste dos asistencias virtuales?</label>
                  <div class="group-inputs d-flex flex-row align-items-center">
                    <span
                      style="cursor:pointer"
                      v-if="data.encuestaUser.virtual_assists_boolean"
                      class="mr-1"
                      @click.prevent="changeOng"
                    >SI</span>
                    <span style="cursor:pointer" v-else class="mr-1" @click.prevent="changeOng">NO</span>
                    <input
                      v-model="data.encuestaUser.virtual_assists"
                      type="text"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 justify-content-end">
                  <label for>¿Fue útil el tiempo de la llamada?</label>
                  <div class="group-inputs d-flex flex-row align-items-center">
                    <span
                      style="cursor:pointer"
                      v-if="data.encuestaUser.call_time_boolean"
                      class="mr-1"
                      @click.prevent="changeOng"
                    >SI</span>
                    <span style="cursor:pointer" v-else class="mr-1" @click.prevent="changeOng">NO</span>
                    <input v-model="data.encuestaUser.call_time" type="text" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for>¿El asesoramiento fue de calidad, es decir, sirvió para evacuar dudas?</label>
                  <div class="group-inputs d-flex flex-row align-items-center">
                    <span
                      style="cursor:pointer"
                      v-if="data.encuestaUser.quality_advice_boolean"
                      class="mr-1"
                      @click.prevent="changeOng"
                    >SI</span>
                    <span style="cursor:pointer" v-else class="mr-1" @click.prevent="changeOng">NO</span>
                    <input
                      v-model="data.encuestaUser.quality_advice"
                      type="text"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for>¿Cómo fue la atención para resolver tus dudas?</label>
                  <input v-model="data.encuestaUser.attention" type="text" class="form-control" />
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for>Sugerencias:</label>
                  <input v-model="data.encuestaUser.suggestions" type="text" class="form-control" />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6>Sobre el contenido</h6>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                  <label
                    for
                  >La lectura del Manual fue sencilla y dinámica, los capítulos están integrados entre sí:</label>
                  <input
                    v-model="data.encuestaUser.content_option_1"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3 d-flex flex-column justify-content-between">
                  <label for>Los objetivos están claramente definidos:</label>
                  <input
                    v-model="data.encuestaUser.content_option_2"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label
                    for
                  >Se describe en detalle la composición y fabricación del producto final (Eco-ladrillo) del proyecto:</label>
                  <input
                    v-model="data.encuestaUser.content_option_3"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label
                    for
                  >Se observa una clara relación entre las actividades a desarrollar en el proyecto:</label>
                  <input
                    v-model="data.encuestaUser.content_option_4"
                    type="text"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-between">
                  <label
                    for
                  >Se detallan todos los pasos a seguir y la secuencia temporal es detallada, coherente y factible:</label>
                  <input
                    v-model="data.encuestaUser.content_option_5"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label
                    for
                  >Se utiliza información y materiales suficientes para hacer del proyecto comprensible y significativo:</label>
                  <input
                    v-model="data.encuestaUser.content_option_6"
                    type="text"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6>Valoración por capítulo</h6>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 1</label>
                  <input v-model="data.encuestaUser.chapter_1" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 2</label>
                  <input v-model="data.encuestaUser.chapter_2" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 3</label>
                  <input v-model="data.encuestaUser.chapter_3" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 4</label>
                  <input v-model="data.encuestaUser.chapter_4" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 5</label>
                  <input v-model="data.encuestaUser.chapter_5" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 6</label>
                  <input v-model="data.encuestaUser.chapter_6" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 7</label>
                  <input v-model="data.encuestaUser.chapter_7" type="text" class="form-control capitulo" />
                </div>
                <div class="col-6 col-sm-1 mb-3 mb-lg-0">
                  <label for>Capítulo 8</label>
                  <input v-model="data.encuestaUser.chapter_8" type="text" class="form-control capitulo" />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6>Valoración personal</h6>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="inputs">
                    <label>¿Cómo estás de satisfecho/a con el Manual?</label>
                    <input
                      v-model="data.encuestaUser.satisfied"
                      type="text"
                      class="form-control"
                      placeholder
                    />
                  </div>
                  <div class="inputs mt-3">
                    <label>¿Recomendarías el Manual a otras personas?</label>
                    <input
                      v-model="data.encuestaUser.would_you_recommend"
                      type="text"
                      class="form-control"
                      placeholder
                    />
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Sugerencias</label>
                  <textarea v-model="data.encuestaUser.suggestions_2" class="form-control" rows="5"></textarea>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>¿Qué fue lo que más te gustó del Manual?</label>
                  <textarea v-model="data.encuestaUser.like" class="form-control" rows="5"></textarea>
                </div>
              </div>
              <div class="form-group row mt-3">
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-success" @click.prevent="guardar" type="button">Guardar <img src="/assets/img/save.svg" alt=""></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <notifications group="userInforSave" />
    </div>
  </div>
</template>

<script src="./script.component.js"></script>
<style>
.divider {
  width: 100%;
  background-color: #00b49d;
  height: 2px;
  margin: 20px 0px;
}
</style>
