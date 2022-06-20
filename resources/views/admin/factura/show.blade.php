@extends('layouts.nav')
@section('contenido')
    <div class="container-fluid">
        <h2>Detalles de la venta</h2>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4 text-center"><strong>Cliente</strong></div>
            <div class="col-md-4 text-center"><strong>Vendedor</strong></div>
            <div class="col-md-4 text-center"><strong>Numero de venta</strong></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 text-center">{{$factura->cliente}}</div>
            <div class="col-md-4 text-center">{{$factura->user}}</div>
            <div class="col-md-4 text-center">{{$factura->id_factura}}</div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive col-md-12">
                        <table id="detalleFacturass" class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio Venta (BS)</th>
                                    <th>Descuento(BS)</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal(BS)</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">SUBTOTAL:</p>
                                    </th>
                                    <th>
                                        <p align="right">bs/{{number_format($subtotal,2)}}</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">TOTAL:</p>
                                    </th>
                                    <th>
                                        <p align="right">bs/{{number_format($factura->total,2)}}</p>
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($detalleFacturas as $detalleFacturas)
                                <tr>
                                    <td>{{$detalleFacturas->servicio->nombre_servicio ?? 'none'}}</td>
                                    <td>bs/ {{$detalleFacturas->precio_unitario}}</td>
                                    <td>{{$detalleFacturas->descuento}} %</td>
                                    <td>{{$detalleFacturas->cantidad}}</td>
                                    <td>bs/{{number_format($detalleFacturas->cantidad*$detalleFacturas->precio_unitario - $detalleFacturas->cantidad*$detalleFacturas->precio_unitario*$detalleFacturas->descuento/100,2)}}
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
@endsection
