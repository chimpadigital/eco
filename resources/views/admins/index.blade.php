@extends('layouts.base')
@section('title','Users')

@section('content')
<!-- Page content -->
<div class="page-content pt-0 dashboard" id="app">

<!-- Main content -->
<div class="content-wrapper">

<!-- Content area -->
<div class="content mt-5">

<div class="align-content-center h-100 justify-content-center row" id="dashboard">
    <div class="col-12 col-lg-8 col-xl-8">
      <div class="card">
          <div class="card-body p-4 p-lg-5 border-radius">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 d-flex flex-column">
                    <img src="{{ asset('site_') }}assets/img/logo.svg" class="align-self-lg-start mb-4" alt="logo">
                    <h1 class="color-verde line-height-1 mb-0">Bienvenidos</h1>
                    <h5 class="home">Al día de la fecha ya sumamos</h5>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="card bg-teal-400 replicadores text-center">
                        <div class="card-body">
                            <div class="">
                                <img src="{{ asset('') }}assets/img/dashboard-icon.svg" class="dashboard-icon" alt="logo">
                                <h2 class="font-weight-semibold mb-0 din-pro text-white">{{count($users)}}</h2>
                                <span class="badge bg-teal-800 badge-pill align-self-center ml-auto"></span>
                            </div>
                            
                            <div>
                                <h4 class="din-pro text-white">
                                    Replicadores
                                </h4>
                                {{-- <div class="font-size-sm opacity-75">489 avg</div> --}}
                            </div>
                        </div>
    
                        <div class="container-fluid my-2">
                        <div class="row ">
                            <div class="col-12 justify-content-center d-flex align-items-center">
                                <a  href="/admin/users" class="btn bg-white">Lista de replicadores</a>
                            </div>
                        </div>
                            {{-- <div id="members-online"></div> --}}
                        </div>
                    </div>
                    <!-- /members online -->
                </div>
            </div>
          </div>
      </div>
    </div>
</div>

</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->
@endsection