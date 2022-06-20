@extends('layouts.nav')
@section('contenido')
<div class="card">
  <div class="card-header">Crear Nuevo Rol</div>
  <div class="card-body">

      <form action="{{ url('rol') }}" method="post">
        {!! csrf_field() !!}
        <label>Nuevo rol</label></br>
        <input type="text" name="nombre_rol" id="nombre_rol" class="form-control"></br>
        <label>Descripcion rol</label></br>
        <input type="text" name="descripcion_rol" id="descripcion_rol" class="form-control"></br>
        <input type="submit" value="Guardar" class="btn btn-success"></br>
    </form>

  </div>
</div>
@endsection
