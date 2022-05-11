@extends('layouts.nav')
@section('tittle','Editar Usuario')
@section('contenido')
<div class="container mt-5">

    <div class="card">
      <div class="card-header">Editar rol</div>
      <div class="card-body">

          <form action="{{ url('user/' .$user->id_users) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <label>Nombres</label></br>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></br>

            <label>Apellidos</label></br>
            <input type="text" name="apellido" id="apellido" value="{{$user->apellido}}" class="form-control"></br>

            <label>Fecha nacimiento</label></br>
            <input type="date" name="fecha_nac_user" id="fecha_nac_user" value="{{$user->fecha_nac_user}}" class="form-control"></br>


            <label>Celular</label></br>
            <input type="number" name="Celular" id="Celular" value="{{$user->Celular}}" class="form-control"></br>

            <label>email</label></br>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"></br>




            <input type="submit" value="Actualizar" class="btn btn-success"></br>
        </form>

      </div>
    </div>
@endsection





