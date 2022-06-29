@extends('layouts.nav')
@section('title', 'Ventas')
@section('contenido')
    <div class="container-fluid mb-4">
        <h1>Ventas y Facturas</h1>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Lista de Ventas</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('factura.create') }}" class="btn btn-primary btn-lg mb-3">Vender</a>
                <div class="table-responsive">
                    <table id="tablitas" class="table table-striped table-bordered">
                        <caption>Lista de Ventas</caption>
                        <thead>
                            <tr>
                                <th># Factura</th>
                                <th>Fecha emision</th>
                                <th>Usuario</th>
                                <th>Total</th>
                                <th>Cliente</th>
                                <th>Fecha_maxima_emision</th>
                                <th>CI del cliente</th>
                                <th>Codigo de Control</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr>
                                    <td>{{ $factura->id_factura }}</td>
                                    <td>{{ $factura->fecha_emision }}</td>
                                    <td>{{ $factura->user }}</td>
                                    <td>{{ $factura->total }}</td>
                                    <td>{{ $factura->cliente }}</td>
                                    <td>{{ $factura->fecha_maxima_emision }}</td>
                                    <td>{{ $factura->ci_cliente }}</td>
                                    <td>{{ $factura->codigo_control }}</td>
                                    <td><a title="Detalles" class="btn btn-success btn-sm"
                                            href="{{ route('factura.show', $factura) }}"><i class="bi bi-eye-fill"></i></a>

                                            {{-- <a
                                            class="btn btn-danger btn-sm"

                                            href="{{ route('factura.destroy', $factura) }}"><i class="bi bi-trash-fill"></i></a> --}}

                                        </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
