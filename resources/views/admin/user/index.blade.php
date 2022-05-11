@include('layouts.nav')
@if(Session::has('Registro_de_users'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Registro exitoso</strong> {{session('Registro_de_users') }}
  </div>

 @endif
