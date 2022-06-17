@extends('layouts.nav')
@section('title', 'Login')
@section('contenido')
<div class="mt-4 d-flex justify-content-center">
    <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" aria-describedby="emailHelp">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
