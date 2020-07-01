<template>
  <div class="card text-left">
    <div class="card-header">
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-3 d-flex flex-column">
          <div class="icon">
            <span class="icon-user" style="font-size: 3rem;"></span>
          </div>
          <h4
            class="card-title"
          >perfil de: {{ data.inforPerfil.nombre+' '+data.inforPerfil.apellido }}</h4>
        </div>
        <div class="col-12 col-sm-6 col-md-2 d-flex justify-content-end align-items-end">
          <a href="/admin/users" class="btn btn-success">Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-1">
          <label for="pago">Pago</label>
          <input
            v-model="data.procesoSesion.pago"
            class="form-control"
            type="checkbox"
            name="pago"
            id="pago"
          />
        </div>
        <div class="col-12 col-sm-6 col-md-1">
          <label for="descargas">Descargas</label>
          <input
            v-model="data.procesoSesion.descargar"
            class="form-control"
            type="checkbox"
            name="descargas"
            id="descargas"
          />
        </div>
        <div class="col-12 col-sm-6 col-md-2 d-flex align-items-end">
          <div class="input-fecha" style="margin-right:2px;">
            <label for="primer_sesion">Primer Sesión</label>
            <p style="width: 154px;">{{data.procesoSesion.primerSesionFecha}}</p>
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

        <div class="col-12 col-sm-6 col-md-2 d-flex align-items-end">
          <div class="input-fecha" style="margin-right:2px;">
            <label for="segunda_sesion">Segunda Sesión</label>
            <p style="width: 154px;">{{data.procesoSesion.segunSesionFecha}}</p>

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

        <div class="col-12 col-sm-6 col-md-2">
          <label for="condiciones_uso">Condiciones Generales de Uso</label>
          <input
            class="form-control"
            v-model="data.procesoSesion.condicionesGenerales"
            type="checkbox"
            name="condiciones_uso"
            id="condiciones_uso"
          />
        </div>
        <div class="col-12 col-sm-6 col-md-2">
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
          <p>{{data.procesoSesion.cupon}}</p>
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
                <input v-model="data.inforPerfil.fechaNacimiento" type="date" class="form-control" />
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
              <div class="col-12 col-sm-6">
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
              <div class="col-12 col-sm-6 justify-content-end">
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
              <div class="col-6 col-sm-6 col-md-3">
                <label>Pertenece a una ONG</label>
                <div class="group-inputs d-flex flex-row align-items-center">
                  <span
                    style="cursor:pointer"
                    v-if="data.otraInfo.ong"
                    class="mr-1"
                    @click.prevent="changeOng"
                  >SI</span>
                  <span style="cursor:pointer" v-else class="mr-1" @click.prevent="changeOng">NO</span>
                  <!-- <input v-model="data.otraInfo.ong" type="checkbox" name id /> -->
                  <input v-model="data.otraInfo.nombreOgn" type="text" class="form-control" />
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-3">
                <label>Tienes página web?</label>
                <input v-model="data.otraInfo.paginaWeb" type="text" class="form-control" />
              </div>
              <div class="col-6 col-sm-6 col-md-3">
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
              <div class="col-6 col-sm-6 col-md-3">
                <label>Implementación anterior de proyectos</label>
                <div class="group-inputs d-flex flex-row align-items-center">
                  <span
                    style="cursor:pointer"
                    v-if="data.otraInfo.ImplementacionAnt"
                    class="mr-1"
                    @click.prevent="changeImplementacion"
                  >SI</span>
                  <span
                    style="cursor:pointer"
                    v-else
                    class="mr-1"
                    @click.prevent="changeImplementacion"
                  >NO</span>
                  <!-- <input
                    v-model="
                                            data.otraInfo.ImplementacionAnt
                                        "
                    type="checkbox"
                    name
                    id
                  />-->
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
                <input v-model="data.informacionExtra" type="text" class="form-control" placeholder />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-2">
                <button class="btn btn-success" @click.prevent="guardar" type="button">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <notifications group="userInforSave" />
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
