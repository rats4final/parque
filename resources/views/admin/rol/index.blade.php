@extends('admin.rol.layout')
@section('content')
@include('layouts.nav')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Crud Rol</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/rol/create') }}" class="btn btn-success btn-sm" title="Add New rol">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="tablitas">
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
                                        <td>
                                            <a href="{{ url('rol/' . $item->id_rol) }}" title="View rol"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ver</button></a>
                                            <a href="{{ url('rol/' . $item->id_rol . '/edit') }}" title="Edit rol"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            <form method="POST" action="{{ url('/rol' . '/' . $item->id_rol) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete rol" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
<script src="js/tables.js">
</script>
