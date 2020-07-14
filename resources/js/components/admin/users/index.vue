<template>
  <div class="users">
    <div class="row">
      <div class="col-12">
        <div class="card">
          
          <div class="card-body">
            <!-- buscador -->
            <div class="row justify-content-end my-3">
              <div class="col-12 col-md-6">
                  <img src="/assets/img/replicadores.svg" class="mb-3" alt="">
                  <div class="card-elements-inline">
                    <h4 class="card-title">Replicadores</h4>
                  </div>
              </div>
              <div class="col-12 col-md-6 align-self-center">
                <form action="#" class="p-3 filtro">
                  <div class="form-group mb-0 row">
                    <div class="col-lg-4 col-12 mb-2">
                      <select
                        name="optionsFilter"
                        id="options-filter"
                        class="form-control"
                        v-model="typeFiltro"
                      >
                        <option value="1">Correo Electrónico</option>
                        <option value="2">Telefono</option>
                        <option value="3">Apellido</option>
                      </select>
                    </div>
                    <div class="col-lg-6 col-12">
                      <input v-model="search" type="text" class="form-control" />
                    </div>
                    <div class="col-12 col-lg-2 d-flex justify-content-around">
                      <button
                        class="btn btn-success"
                        @click.prevent="filtrarUsers"
                        type="button"
                      >Buscar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- Table  -->
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                          <span class="icon-user"></span>
                          ID
                        </th>
                        <th>
                          <span class="icon-user"></span>
                          Nombre
                        </th>
                        <th>
                          <span class="icon-user"></span>
                          Apellido
                        </th>
                        <th>
                          <span class="icon-envelop"></span>
                          Email
                        </th>
                        <th>
                          <span class="icon-calendar"></span>
                          Registro
                        </th>
                        <th>
                          <span class="icon-calendar"></span>
                          Ultima Descarga
                        </th>
                        <th>
                          <span class="icon-earth"></span>
                          Pais
                        </th>
                        <th>
                          <span class="icon-coin-dollar"></span>
                          Descuento
                        </th>
                        <th>
                          <span class="icon-calendar"></span>
                          Primer Sesion
                        </th>
                        <th>
                          <span class="icon-calendar"></span>
                          Segunda Sesion
                        </th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, i) in users" :key="i">
                        <td>{{ item.id }}</td>
                        <td>{{ item.nombre }}</td>
                        <td>{{ item.apellido }}</td>
                        <td >{{ item.email }}</td>
                        <td>{{ item.registro }}</td>
                        <td>{{ item.ult_descarga }}</td>
                        <td>{{ item.pais }}</td>
                        <td>{{ item.descuento }}</td>
                        <td>{{ item.primerSesion }}</td>
                        <td>{{ item.segundaSesion }}</td>
                        <td class="d-flex flex-column">
                          <a
                            href="#"
                            class="btn btn-info my-1"
                            @click.prevent="redirecAPerfil(item)"
                          >
                            Ver perfil
                            <i class="icon-eye" aria-hidden="true"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-danger my-1"
                            @click.prevent="eliminarUsuario(item)"
                          >
                            Borrar
                            <i class="icon-bin" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-12 my-3">
                  <nav>
                    <ul class="pagination pagination-flat pagination-rounded align-self-center justify-content-end">
                      <li class="page-item" v-if="pagination.current_page > 1">
                        <a
                          href="#"
                          @click.prevent="cambiarPagina(pagination.current_page - 1)"
                          class="page-link"
                        ><img src="/assets/img/pag-left.svg" alt=""></a>
                      </li>
                      <li
                        class="page-item"
                        v-for="page in pagesNumber"
                        :key="page"
                        :class="[page == isActived ? 'active' : '']"
                      >
                        <a
                          href="#"
                          @click.prevent="cambiarPagina(page)"
                          v-text="page"
                          class="page-link"
                        ></a>
                      </li>

                      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                        <a
                          href="#"
                          @click.prevent="cambiarPagina(pagination.current_page + 1)"
                          class="page-link"
                        ><img src="/assets/img/pag-right.svg" alt=""></a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <notifications group="userdelete" />
  </div>
</template>

<script src="./scripts.component.js"></script>
<style >
.swal2-icon.swal2-warning {
  font-size: 1rem !important;
}
</style>
