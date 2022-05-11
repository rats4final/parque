<!--pinche david -->

@include('layouts.nav')
@section('tittle','Registro user')

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

    <label>Nombres</label><br> <input type="text" class="form-control" name="name" id="name" required> <br>
    <label>Apellidos</label><br> <input type="text" class="form-control" name="apellido" id="apellido" required><br>
    <label>Fecha nacimiento </label><br> <input type="date" class="form-control" name="fecha_nac_user" id="fecha_nac_user" required><br>
    <label>Celular</label><br> <input type="number" class="form-control" name="Celular" id="Celular" required><br>
    <label>Email</label><br> <input type="text" class="form-control" name="email" id="email"  placeholder="Correo@example.com" required><br>
    <label>Contraseña</label><br> <input type="password" class="form-control" name="password" id="password" required><br>
    <button type="submit" class="btn btn-primary">registro</button>

</form>

    </div>
</div>
</div>
</div>

