@extends('layouts.base')
@section('title','Users')

@section('content')
        <admin-users route-perfil="{{route('admin.perfil')}}"></admin-users>
@endsection