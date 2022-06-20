@extends('admin.usuario_opera_servicio.layout')
@section('content')
<div class="card">
  <div class="card-header">Crear Nueva usuario_opera_servicio</div>
  <div class="card-body">

      <form action="{{ url('usuario_opera_servicio') }}" method="post">
        {!! csrf_field() !!}
        <label>Tipo de Servicio</label></br>
        <select class="input-group" name="servicios_id_servicio" id="servicios_id_servicio">
          @foreach ($servicio as $servicio)
              <option class="input--style-5" value="{{ $servicio->id_servicio }}">{{ $servicio->nombre_servicio }}</option>
          @endforeach
        </select>        
        <label>Nombre</label></br>
        <select class="input-group" name="users_id_user" id="users_id_user">
          @foreach ($users as $users)
              <option class="input--style-5" value="{{ $users->id_users }}">{{ $users->name }}</option>
          @endforeach
        </select>         
        <label>Inicio del Turno</label></br>
        <input type="date" class="form-control" name="turno_inicio" id="turno_inicio">
        <label>Fin del Turno</label></br>
        <input type="date" class="form-control" name="turno_fin" id="turno_fin">
        <input type="submit" value="Guardar" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
