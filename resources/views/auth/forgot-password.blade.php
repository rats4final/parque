@extends('layouts.nav')
@section('title', 'Contraseña Olvidada')
@section('contenido')
    <div class="container mt-4 d-flex justify-content-center">
        <h5>Reestablecimiento de contraseña</h5>
    </div>
    @if (session('status'))
        <div class="container mt-4 d-flex justify-content-center alert alert-success role=" alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('password.request') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                    aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
            </div>
            {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div> --}}
            <button type="submit" class="btn btn-primary">Reestablecer</button>
        </form>
    </div>
@endsection
