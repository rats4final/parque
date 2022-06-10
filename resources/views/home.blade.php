@extends('layouts.nav')
@section('title', 'Dashboard')
@section('contenido')
<h1>Dashboard</h1>

<div class="container">
    <div class="card">
        <div class="card-header">Anuncios</div>
        <div class="card-body">
            <h5 class="card-title">
                @if (! Auth::user()->two_factor_secret){{--TOCAR 2 VECES--}}
                    No ha habilitado la autenticacion de 2 factores
                    <form action="{{url('user/two-factor-authentication')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Activar</button>
                    </form>
                @else
                    La autenticacion de 2 factores esta activada
                    <form action="{{url('user/two-factor-authentication')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Desactivar</button>
                    </form>
                @endif
            </h5>

            @if (session('status') == 'two-factor-authentication-enabled')
                <p class="card-text">
                    La autenticacion de 2 factores ha sido activada, por favor escanee el siguiente QR
                    en su aplicacion de autenticacion favorita.
                    {{!!Auth::user()->twoFactorQrCodeSvg()!!}}
                </p>
                <p>Por favor guarde sus codigos de recuperacion en un lugar seguro</p>
                @foreach (json_decode(decrypt(Auth::user()->two_factor_recovery_codes, true)) as $code)
                    {{trim($code)}}<br>
                @endforeach
            @endif
        </div>
    </div>
</div>


@endsection

