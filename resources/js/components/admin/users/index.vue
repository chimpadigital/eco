<template>
    <div class="users">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-elements-inline">
                        <h4 class="card-title">Replicadores</h4>
                    </div>
                    <div class="card-body">
                        <!-- buscador -->
                        <div class="row justify-content-end my-3">
                            <div class="col-12 col-md-6">
                                <form action="#">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <select
                                                name="optionsFilter"
                                                id="options-filter"
                                                class="form-control"
                                                v-model="typeFiltro"
                                            >
                                                <option value="1"
                                                    >Correo Electrónico</option
                                                >
                                                <option value="2"
                                                    >Telefono</option
                                                >
                                                <option value="3"
                                                    >Apellido</option
                                                >
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <input
                                                v-model="search"
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="col-2">
                                            <button
                                                class="btn btn-success"
                                                @click.prevent="filtrarUsers"
                                                type="button"
                                            >
                                                Buscar
                                            </button>
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
                                                    <span
                                                        class="icon-user"
                                                    ></span>
                                                    Nombre
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-user"
                                                    ></span>
                                                    Apellido
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-envelop"
                                                    ></span>
                                                    Email
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-phone"
                                                    ></span>
                                                    Telefono
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-earth"
                                                    ></span>
                                                    Pais
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-coin-dollar"
                                                    ></span>
                                                    Descuento
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-calendar"
                                                    ></span>
                                                    Primer Sesion
                                                </th>
                                                <th>
                                                    <span
                                                        class="icon-calendar"
                                                    ></span>
                                                    Segunda Sesion
                                                </th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, i) in users"
                                                :key="i"
                                            >
                                                <td>{{ item.nombre }}</td>
                                                <td>{{ item.apellido }}</td>
                                                <td>{{ item.email }}</td>
                                                <td>{{ item.telefono }}</td>
                                                <td>{{ item.pais }}</td>
                                                <td>{{ item.descuento }}</td>
                                                <td>{{ item.primerSesion }}</td>
                                                <td>
                                                    {{ item.segundaSesion }}
                                                </td>
                                                <td class="d-flex flex-column">
                                                    <a
                                                        href="#"
                                                        class="btn btn-info my-1"
                                                        @click.prevent="
                                                            redirecAPerfil(item)
                                                        "
                                                    >
                                                        Ver perfil
                                                        <i
                                                            class="icon-eye"
                                                            aria-hidden="true"
                                                        ></i>
                                                    </a>
                                                    <!-- <a
                            href="#"
                            class="btn btn-danger my-1"
                            @click.prevent="eliminarUsuario(item)"
                          >
                            Borrar
                            <i class="icon-bin" aria-hidden="true"></i>
                          </a> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./scripts.component.js"></script>
