@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su casilla de mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ah enviado un nuevo link de verificación de contraseña.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, proceda con el link que se envió a su mail.') }}
                    {{ __('Si no recibió el mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aquí para reenviarlo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
