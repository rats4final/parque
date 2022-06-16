@extends('layouts.sidebar')
@section('contenido')
@include('layouts.nav')
<h1>Index Servicios</h1>


<div class="d-flex justify-content-end">
    <label>Crear nuevo Servicio</label>
    <a href="{{route('servicio.create')}}" class="btn btn-primary">Crear</a>
</div>
<br>
<div class="table-responsive">
    <table id="tablitas" class="table caption-top">
        <caption>Lista de Servicios</caption>
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                {{-- <th>Codigo del Servicio</th> --}}
                <th>Nombre del Servicio</th>
                <th>Descripción del servicio</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <th>{{ $servicio->id_servicio }}</th>
                    <td>{{ $servicio->nombre_servicio }}</td>
                    <td>{{ $servicio->descripcion_servicio }}</td>
                    <td>{{ $servicio->precio_servicio }}</td>
                    <td>{{ $servicio->categorias->nombre_categoria}}</td>
                    <td><a class="btn btn-success btn-sm" href="{{ route('servicio.edit', $servicio) }}">Editar</a> <a class="btn btn-danger btn-sm" href="{{ route('servicio.destroy', $servicio) }}">Eliminar</a></td>
                    {{-- <td><a class="btn btn-danger" href="{{ route('servicio.destroy', $servicio) }}" title="Eliminar"></a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script src="js/tables.js">
</script>
