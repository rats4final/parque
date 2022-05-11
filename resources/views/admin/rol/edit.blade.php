@extends('admin.rol.layout')
@section('content')
<div class="card">
  <div class="card-header">Editar rol</div>
  <div class="card-body">
      
      <form action="{{ url('rol/' .$rol->id_rol) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id_rol" id="id_rol" value="{{$rol->id_rol}}" id="id_rol" />
        <label>Rol</label></br>
        <input type="text" name="nombre_rol" id="nombre_rol" value="{{$rol->nombre_rol}}" class="form-control"></br>
        <label>Descripcion rol</label></br>
        <input type="text" name="descripcion_rol" id="descripcion_rol" value="{{$rol->descripcion_rol}}" class="form-control"></br>
        <input type="submit" value="Actualizar" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop