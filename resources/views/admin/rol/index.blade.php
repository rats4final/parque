@extends('layouts.nav')
@section('title','Roles')
@section('contenido')
<div class="container-fluid mb-4">
    <h1>Roles</h1>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Lista de Roles</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('rol.create') }}" class="btn btn-primary btn-lg mb-3">Agregar</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablitas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rol</th>
                            <th>Descripcion rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rol as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nombre_rol }}</td>
                            <td>{{ $item->descripcion_rol }}</td>
                            <td><a class="btn btn-info btn-sm" href="{{ route('rol.show', $item) }}">Ver</a> <a class="btn btn-success btn-sm" href="{{ route('rol.edit', $item) }}">Editar</a> <a class="btn btn-danger btn-sm" href="{{ route('rol.destroy', $item) }}">Eliminar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
