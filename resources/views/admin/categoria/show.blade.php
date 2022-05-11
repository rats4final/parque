@extends('admin.categoria.layout')
@section('content')
<div class="card">
  <div class="card-header">Pagina de categoria</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">categoria : {{ $categoria->nombre_categoria }}</h5>
        <p class="card-text"> Descripcion categoria : {{ $categoria->descripcion_categoria }}</p>
  </div>

    </hr>

  </div>
</div>
