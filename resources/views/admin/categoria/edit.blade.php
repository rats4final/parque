@extends('layouts.nav')
@section('contenido')
<div class="card">
  <div class="card-header">Editar categoria</div>
  <div class="card-body">

      <form action="{{ url('categoria/' .$categoria->id_categoria) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id_categoria" id="id_categoria" value="{{$categoria->id_categoria}}" id="id_categoria" />
        <label>categoria</label></br>
        <input type="text" name="nombre_categoria" id="nombre_categoria" value="{{$categoria->nombre_categoria}}" class="form-contcategoria"></br>
        <label>Descripcion categoria</label></br>
        <input type="text" name="descripcion_categoria" id="descripcion_categoria" value="{{$categoria->descripcion_categoria}}" class="form-contcategoria"></br>
        <input type="submit" value="Actualizar" class="btn btn-success"></br>
    </form>

  </div>
</div>
@endsection
