@extends('layouts.nav')
@section('title','Show user')
@section('contenido')
<div class="container mt-5">
<div class="card">
  <div class="card-header">Pagina de Rol</div>
  <div class="card-body"><div class="container mt-5">

        <div class="card-body">
        <h5 class="card-title">Nombres : {{ $user->name }}</h5>
        <p class="card-text"> apellido: {{ $user->apellido }}</p>
        <p class="card-text">fecha_nac_user : {{ $user->fecha_nac_user }}</p>
        <p class="card-text"> Celular : {{ $user->Celular }}</p>
        <p class="card-text"> email : {{ $user->email }}</p>

  </div>

    </hr>

  </div>
</div>
</div>
@endsection

