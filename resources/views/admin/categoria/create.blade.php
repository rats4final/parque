@extends('layouts.nav')
@section('contenido')
<div class="card">
  <div class="card-header">Crear Nueva Categoria</div>
  <div class="card-body">

      <form action="{{ url('categoria') }}" method="post">
        {!! csrf_field() !!}
        <label>Nuevo categoria</label></br>
        <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-contcategoria"></br>
        <label>Descripcion categoria</label></br>
        <input type="text" name="descripcion_categoria" id="descripcion_categoria" class="form-contcategoria"></br>
        <input type="submit" value="Guardar" class="btn btn-success"></br>
    </form>

  </div>
</div>
@endsection
