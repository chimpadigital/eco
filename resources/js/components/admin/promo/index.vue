<template>
  <div class="card text-left">
    <div class="card-header">
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-3 d-flex flex-column">
          <div class="icon">
             <img src="/assets/img/cupon.svg" class="mb-3" alt="">
          </div>
          <h4 class="card-title">Cupones de descuentos</h4>
        </div>
        <div class="col-12 col-sm-6 col-md-2 d-flex justify-content-center justify-content-lg-end align-items-end mt-3 mt-lg-0">
          <a href="/admin" class="btn btn-info mr-3"><img src="/assets/img/back.svg" class="mr-1" alt=""> Volver</a>
          <button class="btn btn-success" @click.prevent="agregarPromo">Agregar <img src="/assets/img/plus.svg" class="mr-1" alt=""></button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row form-group" v-for="(promo,i) in promos" :key="i">
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
          <p>{{promo.quantity_applied}}</p>
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
        <div class="col-12 d-flex justify-content-end">
          <button class="btn btn-success" @click.prevent="guardarPromo">Guardar <img src="/assets/img/save.svg" alt=""></button>
        </div>
      </div>
    </div>
    <notifications group="InforSave" />
  </div>
</template>

<script src="./script.component.js"></script>
<style>
</style>
