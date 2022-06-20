@extends('layouts.nav')
@section('title', 'Servicios')
@section('contenido')
    <div class="container-fluid mb-4">
        <h1>Servicios</h1>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Lista de Servicios</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('servicio.create') }}" class="btn btn-primary btn-lg mb-3">Crear Nuevo Servicio</a>
                <div class="table-responsive">
                    <table id="tablitas" class="table table-striped table-bordered">
                        <caption>Lista de Servicios</caption>
                        <thead>
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
                                    <td>{{ $servicio->id_servicio }}</td>
                                    <td>{{ $servicio->nombre_servicio }}</td>
                                    <td>{{ $servicio->descripcion_servicio }}</td>
                                    <td>{{ $servicio->precio_servicio }}</td>
                                    <td>{{ $servicio->categorias->nombre_categoria}}</td>
                                    <td><a class="btn btn-success btn-sm" href="{{ route('servicio.edit', $servicio) }}">Editar</a> <a class="btn btn-danger btn-sm" href="{{ route('servicio.destroy', $servicio) }}">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
