@extends('layouts.nav')
@section('title', 'Verificar Email')
@section('contenido')
<div class="container mt-4 d-flex justify-content-center">
    <h6>Debes verificar tu direccion de correo, chequea tu correo para obtener el link de verificacion</h6>
</div>
@if (session('status'))
        <div class="container mt-4 d-flex justify-content-center alert alert-success role=" alert">
            {{ session('status') }}
        </div>
    @endif
<div class="mt-4 d-flex justify-content-center">
    <form method="POST" action="{{route('verification.send')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Reenviar correo</button>
    </form>
</div>
@endsection
