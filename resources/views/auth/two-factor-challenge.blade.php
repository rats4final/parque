@extends('layouts.nav')
@section('title', 'Confirmacion de codigo 2FA')
@section('contenido')
<div class="mt-4 d-flex justify-content-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">{{session(status)}}</div>
    @endif
    <form method="POST" action="{{url('/two-factor-challenge')}}">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Codigo de autenticacion</label>
            <input type="code" name="code" id="code" class="form-control  @error('code') is-invalid @enderror">
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
