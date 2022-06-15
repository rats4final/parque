@extends('layouts.sidebar')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Crud Categoria</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/categoria/create') }}" class="btn btn-success btn-sm" title="Add New categoria">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Categoria</th>
                                        <th>Descripcion Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categoria as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre_categoria }}</td>
                                        <td>{{ $item->descripcion_categoria }}</td>
                                        <td>
                                            <a href="{{ url('categoria/' . $item->id_categoria) }}" title="View categoria"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ver</button></a>
                                            <a href="{{ url('categoria/' . $item->id_categoria . '/edit') }}" title="Edit categoria"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            <form method="POST" action="{{ url('/categoria' . '/' . $item->id_categoria) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete categoria" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
