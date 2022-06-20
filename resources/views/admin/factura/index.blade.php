@extends('layouts.nav')
@section('title','Ventas')
@section('contenido')
<h1>Index Servicios</h1>
<div class="d-flex justify-content-end">
    <label>Crear nuevo Servicio</label>
    <a href="{{route('factura.create')}}" class="btn btn-primary">Crear</a>
</div>
<br>
<div class="table-responsive">
    <table id="tablitas" class="table">
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
                    <td>{{ $factura->user}}</td>
                    <td>{{ $factura->total }}</td>
                    <td>{{ $factura->cliente}}</td>
                    <td>{{ $factura->fecha_maxima_emision}}</td>
                    <td>{{ $factura->ci_cliente}}</td>
                    <td>{{ $factura->codigo_control}}</td>
                    <td><a class="btn btn-success btn-sm" href="{{ route('factura.show', $factura) }}">Detalles</a> <a class="btn btn-danger btn-sm" href="{{ route('factura.destroy', $factura) }}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
