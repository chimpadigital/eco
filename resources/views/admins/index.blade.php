@extends('layouts.base')
@section('title','Users')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
          <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 d-flex align-items-center">
                    <h1>Bienvenidos</h1>
                </div>
                <div class="col-6">
                    <div class="card bg-teal-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{count($users)}}</h3>
                                <span class="badge bg-teal-800 badge-pill align-self-center ml-auto"></span>
                            </div>
                            
                            <div>
                                Replicadores
                                {{-- <div class="font-size-sm opacity-75">489 avg</div> --}}
                            </div>
                        </div>
    
                        <div class="container-fluid my-2">
                        <div class="row ">
                            <div class="col-12 justify-content-center d-flex align-items-center">
                                <button class="btn bg-white">Lista de replicadores</button>
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
@endsection