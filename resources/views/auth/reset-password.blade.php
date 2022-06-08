@extends('layouts.nav')
@section('title', 'Reestablecimiento de contraseña')
@section('contenido')
    <div class="container mt-4 d-flex justify-content-center">
        <h5>Reestablecimiento de contraseña</h5>
    </div>
    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{$request->route('token')}}">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    aria-describedby="emailHelp" value="{{$request->email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1">
                @error('password')
                <span class="invalid-feedback " role="alert">{{--  no olvidarse el  is-invalid--}}
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
