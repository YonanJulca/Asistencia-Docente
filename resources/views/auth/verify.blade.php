@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Encabezado de la tarjeta para la verificación de correo electrónico -->
                <div class="card-header">{{ __('Verificar dirección de correo electrónico') }}</div>

                <div class="card-body">
                    <!-- Mensaje de éxito si se ha enviado un nuevo enlace de verificación -->
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </div>
                    @endif

                    <!-- Mensaje instructivo y formulario para solicitar otro enlace de verificación -->
                    {{ __('Antes de continuar, por favor revisa tu correo electrónico para encontrar el enlace de verificación.') }}
                    {{ __('Si no recibiste el correo electrónico') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haz clic aquí para solicitar otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
