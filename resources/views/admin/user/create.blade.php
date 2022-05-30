<!--pinche david -->

@extends('layouts.nav')
@section('title','Registro user')

@section('contenido')
<div class="card bg-dark text-white">
    <div class="card-body">

<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Index</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
      </nav>
    <div class="row">


<form action="{{ url('/user') }}" method="post">

    @csrf {{-- pinche marco olvida tokens --}}

    <label>Nombres</label><br> <input type="text" class="form-control" name="name" id="name" required>
 @error('name')
            <li class="text-danger">{{$message}}</li>
            @enderror
    <label>Apellidos</label><br> <input type="text" class="form-control" name="apellido" id="apellido" required>
 @error('apellido')
            <li class="text-danger">{{$message}}</li>
            @enderror
    <label>Fecha nacimiento </label><br> <input type="date" class="form-control" name="fecha_nac_user" id="fecha_nac_user" max="2003-12-31" min="1965-12-01" required>

    <label>Celular</label><br> <input type="text" class="form-control" name="Celular" id="Celular" required>
    @error('Celular')
    <li class="text-danger">{{$message}}</li>
    @enderror
    <label>Email</label><br> <input type="text" class="form-control" name="email" id="email"  placeholder="Correo@example.com" required>
    @error('email')
    <li class="text-danger">{{$message}}</li>
    @enderror
    <label>Contraseña</label><br> <input type="password" class="form-control" name="password" id="password" required>
    @error('password')
    <li class="text-danger">{{$message}}</li><br>
    @enderror
    <button type="submit" class="btn btn-primary">registro</button>



</form>

    </div>
</div>
</div>
</div>
@endsection



