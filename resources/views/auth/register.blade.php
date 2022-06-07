@extends('layouts.nav')
@section('title', 'Registro')
@section('contenido')
<div class="mt-4 d-flex justify-content-center">
    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp">
            @error('name')
            <span class="invalid-feedback " role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <span class="invalid-feedback " role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1">
            @error('password')
            <span class="invalid-feedback " role="alert">{{--  no olvidarse el  --}}
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
