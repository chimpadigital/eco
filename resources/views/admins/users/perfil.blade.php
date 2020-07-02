@extends('layouts.base')
@section('title','Users')

@section('content')
<!-- Page content -->
<div class="page-content pt-0" id="app">

<!-- Main content -->
<div class="content-wrapper">

<!-- Content area -->
<div class="content mt-5">

        <admin-perfil route-perfil="{{route('admin.pedir.perfil')}}"></admin-perfil>
</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->
@endsection