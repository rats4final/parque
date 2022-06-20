@extends('admin.usuario_opera_servicio.layout')
@section('content')
@extends('layouts.sidebar')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Crud usuario_opera_servicio</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/usuario_opera_servicio/create') }}" class="btn btn-success btn-sm" title="Add New usuario_opera_servicio">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Servicio</th>
                                        <th>Descripcion</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Finalizacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario_opera_servicio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->users->apellido }}</td>
                                        <td>{{ $item->servicio->nombre_servicio }}</td>
                                        <td>{{ $item->servicio->descripcion_servicio }}</td>
                                        <td>{{ $item->turno_inicio }}</td>
                                        <td>{{ $item->turno_fin }}</td>
                                        <td>
                                            <a href="{{ url('usuario_opera_servicio/' . $item->servicios_id_servicio) }}" title="View usuario_opera_servicio"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ver</button></a>
                                            <a href="{{ url('usuario_opera_servicio/' . $item->servicios_id_servicio . '/edit') }}" title="Edit usuario_opera_servicio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            <form method="POST" action="{{ url('/usuario_opera_servicio' . '/' . $item->servicios_id_servicio) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete usuario_opera_servicio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
