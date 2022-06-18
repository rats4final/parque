<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type='text/javascript' src='js/AllegedRC4.js'></script>
    <script src="/storage/qrcodes/app.js"></script>
    <script src="/storage/qrcodes/jspdf.min.js"></script>
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Ventas</title>
</head>

<body>
    {{-- <form id="form" action="{{ url('/factura') }}" method="post">
        @csrf
        <input type="hidden" id="Nombres" name="name" value="{{Auth::user()->name}}">
        <input type="hidden" id="apellido" name="apellido" value="{{Auth::user()->apellido}}">
        <input type="hidden" id="Codigo_control">
        <button type="submit">Subir</button>
    </form>
    <img alt="Código QR" id="codigo"> --}}

    <form action="{{ route('factura.store') }}" method="POST">
        {{-- <input type="hidden" name="facturas_id_factura" value="{{}}"> --}}
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label" for="id_servicio">Servicio</label>
                                <select class="form-control" name="id_servicio" id="id_servicio">
                                    <option disabled selected>Seleccione un servicio</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{$servicio->id_servicio}}_{{$servicio->precio_servicio}}">{{$servicio->nombre_servicio}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="precio_unitario">Precio</label>
                                <input class="form-control" type="number" name="precio_unitario" id="precio_unitario"
                                    disabled>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input min="1" class="form-control" type="number" name="cantidad"
                                    id="cantidad">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="descuento">Porcentaje de Descuento</label>
                                <input min="0" class="form-control" type="number" name="descuento"
                                    id="descuento">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group mt-3">
                <button type="button" id="agregar" class="btn btn-primary float-right">Agregar
                    Servicio</button>
            </div>
            <div class="form-group mt-3">
                <h4 class="card-title">Detalles de venta</h4>
                <div class="table-responsive col-md-12">
                    <table id="detalles" class="table">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Servicio</th>
                                <th>Precio Venta (BS)</th>
                                <th>Descuento</th>
                                <th>Cantidad</th>
                                <th>SubTotal (BS)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right"><span id="total">BS 0.00</span> </p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL PAGAR:</p>
                                </th>
                                <th>
                                    <p align="right"><span align="right" id="total_pagar_html">BS 0.00</span> <input
                                            type="hidden" name="total" id="total_pagar"></p>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <button type="submit">Guardar Venta
    </button>
</form>
    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });
        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        $("#id_servicio").change(mostrarValores)

        function mostrarValores() {
            datosProducto = document.getElementById('id_servicio').value.split('_');
            $("#precio_unitario").val(datosProducto[1]);
        }

        function agregar() {

            datosProducto = document.getElementById('id_servicio').value.split('_');
            id_servicio = datosProducto[0];
            servicio = $("#id_servicio option:selected").text();
            cantidad = $("#cantidad").val();
            descuento = $("#descuento").val();
            precio_unitario = $("#precio_unitario").val();
            if (id_servicio != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio_unitario != "") {
                if (parseInt(cantidad)) {
                    subtotal[cont] = (cantidad * precio_unitario) - (cantidad * precio_unitario * descuento / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +
                        '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                        ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_servicio[]" value="' +
                        id_servicio + '">' + servicio + '</td> <td> <input type="hidden" name="precio_unitario[]" value="' +
                        parseFloat(precio_unitario).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(
                            precio_unitario).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' +
                        parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(
                        descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' + cantidad +
                        '"> <input type="number" value="' + cantidad +
                        '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(
                            2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'No puedes vender 0 cosas',
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#descuento").val("0");
        }

        function totales() {
            $("#total").html("BS " + total.toFixed(2));
            total_pagar = total;
            $("#total_pagar_html").html("BS " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_pagar_html = total;
            $("#total").html("BS" + total);
            $("#total_pagar_html").html("BS" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

</body>

</html>
