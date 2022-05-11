@extends('layouts.nav')
@section('tittle','Registro user')
@section('contenido')
@if(Session::has('Registro_de_users'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Registro exitoso</strong> {{session('Registro_de_users') }}
  </div>

 @endif
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Crud user</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/user/create') }}" class="btn btn-success btn-sm" title="Add New rol">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar user
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="tablitas">
                                <thead>
                                    <tr>

                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha nacimiento</th>
                                        <th>Celular</th>
                                        <th>Correo</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->apellido }}</td>
                                        <td>{{ $item->fecha_nac_user }}</td>
                                        <td>{{ $item->Celular }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <a href="{{ url('user/' . $item->id_users) }}" title="View rol"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ver</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('user/' . $item->id_users . '/edit') }}" title="Edit rol"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            </td>
                                            <td>
                                            <form method="POST" action="{{ url('/user' . '/' . $item->id_users) }}" accept-charset="UTF-8" style="display:inline">
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
    <script src="js/tables.js"></script>
@endsection
