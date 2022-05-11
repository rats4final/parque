@extends('admin.rol.layout')
@section('content')
<div class="card">
  <div class="card-header">Pagina de Rol</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Rol : {{ $rol->nombre_rol }}</h5>
        <p class="card-text"> Descripcion Rol : {{ $rol->descripcion_rol }}</p>
  </div>

    </hr>

  </div>
</div>
