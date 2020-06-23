<template>
  <div class="card text-left">
    <div class="card-header">
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-3 d-flex flex-column">
          <div class="icon">
            <span class="icon-user" style="font-size: 3rem;"></span>
          </div>
          <h4 class="card-title">Perfil {{ "Nombre Apellido" }}</h4>
        </div>
        <div class="col-12 col-sm-6 col-md-2 d-flex justify-content-end align-items-end">
          <a href="#" class="btn btn-success">Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row" v-for="(promo,i) in promos" :key="i">
        <div class="col-12 col-sm-6 col-md-2">
          <label for="nombre">Nombre</label>
          <input
            v-model="promo.code_name"
            class="form-control"
            type="text"
            name="nombre"
            id="nombre"
          />
        </div>
        <div class="col-12 col-sm-6 col-md-2">
          <label for="fecha_expiracion">Fecha Expriración</label>
          <input
            v-model="promo.expiration_date"
            class="form-control"
            type="date"
            name="fecha_expiracion"
            id="fecha_expiracion"
          />
        </div>
        <div class="col-12 col-sm-6 col-md-2">
          <label for="monto">Monto</label>
          <input v-model="promo.amount" class="form-control" type="text" name="monto" id="monto" />
        </div>
        <div class="col-12 col-sm-6 col-md-2">
          <label for="cantidad_aplicada">Cantidad Aplicada</label>
          <p>10</p>
          <!-- <input
            v-model="promo.quantity_applied"
            class="form-control"
            type="text"
            name="cantidad_aplicada"
            id="cantidad_aplicada"
          />-->
        </div>
        <div
          class="col-12 col-sm-6 col-md-2 d-flex align-items-end justify-content-start my-3 my-md-0"
        >
          <button
            v-if="promo.state"
            @click.prevent="cambiarStado(promo,i)"
            class="btn btn-success btn-small mr-1"
          >Activo</button>
          <button
            v-else
            @click.prevent="cambiarStado(promo,i)"
            class="btn btn-warning btn-small mr-1"
          >Desactivado</button>
          <button @click.prevent="eliminarPromo(promo,i)" class="btn btn-danger btn-small">
            <i class="icon-bin" aria-hidden="true"></i>
          </button>
        </div>
        <div class="col-12">
          <div class="divider"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-2">
          <button class="btn btn-info" @click.prevent="agregarPromo">Agregar</button>
        </div>
        <div class="col-2">
          <button class="btn btn-success" @click.prevent="guardarPromo">Guardar</button>
        </div>
      </div>
    </div>
    <notifications group="userInforSave" />
  </div>
</template>

<script src="./script.component.js"></script>
<style>
</style>
