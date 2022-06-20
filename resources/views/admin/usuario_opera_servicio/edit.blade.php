@extends('layouts.nav')
@section('contenido')
<div class="card">
  <div class="card-header">Crear Nueva usuario_opera_servicio</div>
  <div class="card-body">

      <form action="{{ url('usuario_opera_servicio') }}" method="post">
        {!! csrf_field() !!}
        <label>Tipo de Servicio</label></br>
        <select class="input-group" name="servicios_id_servicio" id="servicios_id_servicio">
          @foreach ($users as $users)
          @if ($users->id_users==$servicios_id_servicio->users->id_users)
          <option class="input--style-5" value="{{ $users->id_users }}" selected>{{ $users->nombre_users }}</option>
          @else
          <option class="input--style-5" value="{{ $users->id_users }}">{{ $users->nombre_users }}</option>
          @endif
          @endforeach
        </select>
        <label>Nombre</label></br>
        <select class="input-group" name="users_id_user" id="users_id_user">
          @foreach ($servicio as $servicio)
          @if ($servicio->id_servicio==$servicios_id_servicio->servicio->id_servicio)
          <option class="input--style-5" value="{{ $servicio->id_servicio }}" selected>{{ $servicio->nombre_servicio }}</option>
          @else
          <option class="input--style-5" value="{{ $servicio->id_servicio }}">{{ $servicio->nombre_servicio }}</option>
          @endif
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
@endsection

