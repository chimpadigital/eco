@extends('layouts.base')
@section('title','Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-elements-inline">
                    <h4 class="card-title">Replicadores</h4>
                </div>
                <div class="card-body">
                    {{-- buscador --}}
                    <div class="row  justify-content-end my-3">
                        <div class="col-12 col-md-6">
                            <form action="#">
                                <div class="form-group row">
                                    <div class="col-4">
                                        <select name="optionsFilter" id="options-filter" class="form-control">
                                            <option value="correo">Correo Electrónico</option>
                                            <option value="correo">Telefono</option>
                                            <option value="correo">Apellido</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success">Buscar</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><span class="icon-user"></span> Nombre</th>
                                            <th><span class="icon-user"></span> Apellido</th>
                                            <th><span class="icon-envelop"></span> Email</th>
                                            <th><span class="icon-phone"></span> Telefono</th>
                                            <th><span class="icon-earth"></span> Pais</th>
                                            <th><span class="icon-attach_money"></span> Descuento</th>
                                            <th><span class="icon-calendar"></span> Primer Sesion</th>
                                            <th><span class="icon-calendar"></span> Segunda Sesion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Maria</td>
                                            <td>Petra</td>
                                            <td>mariap@gmail.com</td>
                                            <td>0000000</td>
                                            <td>Uruguay</td>
                                            <td>PROMOECO</td>
                                            <td>01/05/2020</td>
                                            <td>05/06/2020</td>
                                            <td class="d-flex flex-column">
                                                <button class="btn btn-info my-1">Ver perfil <i class="icon-eye" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger my-1">Borrar <i class="icon-bin" aria-hidden="true"></i></button>
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
@endsection