<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">





        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="/storage/qrcodes/app.js"></script>
    <script src="{{URL::asset('/storage/qrcodes/Codigo_Control.js')}}"></script>
    <script src="/storage/qrcodes/jspdf.min.js"></script>
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>





    <title>Ventas</title>
</head>

<body>
    @if(Session::has('Registro_de_users'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Registro exitoso</strong> {{session('Registro_de_users') }}
  </div>

 @endif



<form action="{{ route('factura.store') }}" method="POST" id="form">

    @csrf

    <input type="hidden" id="Nombres" value="{{Auth::user()->name}}">
    <input type="hidden" id="apellido" value="{{Auth::user()->apellido}}">
    <input type="hidden" id="fecha_emision" name="fecha_emision">
    <input type="hidden" id="fecha_maxima_emision" name="fecha_maxima_emision">
    <input type="hidden" id="autorizacion" name="autorizacion">
    <input type="hidden" id="codigo_control" name="codigo_control">

    <input type="hidden" id="ci_cliente" name="ci_cliente">

    <input type="hidden" id="ultima" value="{{$ultima_id}}">

    <input type="hidden" id="cliente_nit" >

    <div class="container">
        <div class="row">

            <div class="form-group mt-3">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar cliente</a>


            </div>
            <div class="col-md-6 offset-md-3">
                <div class="form-group">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="id_servicio">Cliente</label>
                                <select class="form-control" name="cliente"  onchange="check(this.value)" id="cliente" required>
                                    <option disabled selected>Seleccione un cliente</option>
                                    @foreach ($clientes as $cliente)
                                    @if ($cliente->id_rol == 2  )
                                    {{-- <option value="{{$cliente->id_user}}">{{$cliente->name . " " .$cliente->apellido}}</option> --}}

                                    <option value="{{$cliente}}">{{$cliente->name}}</option>
                                    @endif
                                   @endforeach
                                  </select>
                            </div>



                                <div class="mb-3 col-md-6">
                                <label for="Nombres" class="form-label">Nombres</label>
                                <input id="name" name ="cliente"class="form-control" type="text"  readonly>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="Apellido" class="form-label">Apellido</label>
                                <input id="clienteapellido" class="form-control" type="text"  readonly>
                            </div>





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

    <button type="submit" class="btn btn-primary float-right">Guardar Venta
    </button>
</form>



<!-- Modal a -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registro de clientes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="{{url('/cliente')}}" >
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre del cliente</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Apellido del cliente:</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Carnet de identidad:</label>
                <input type="number" pattern="[0-9]{1,10}" oninput="this.value = this.value.replace(/[^0-9.]+/g, '').slice(0,7) ;" class="form-control" id="recipient-name" name="ci">
              </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
      </div>
    </div>
  </div>








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
                        ');"><i class="fa fa-times fa-2x"></i></button></td> <td class="FechaRegistro"><input type="hidden" name="id_servicio[]" value="' +
                        id_servicio + '" >' + servicio + '</td> <td> <input type="hidden" class="precio_unitario" name="precio_unitario[]" id="precio_unitario' + cont +'"  value="' +
                        parseFloat(precio_unitario).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(
                            precio_unitario).toFixed(2) + '" disabled> </td> <td> <input type="hidden" class="descuento" name="descuento[]" value="' +
                        parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(
                        descuento) + '" disabled> </td> <td> <input type="hidden" class="cantidad" name="cantidad[]" value="' + cantidad +
                        '"> <input type="number" value="' + cantidad +
                        '" class="form-control" disabled> </td> <td class="sub_total" align="right">s/' + parseFloat(subtotal[cont]).toFixed(
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

<img alt="Código QR" style="display:none;" id="codigo">

<script>


    const  generateRandomString = (num) => {
        const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result1= ' ';
        const charactersLength = characters.length;
        for ( let i = 0; i < num; i++ ) {
            result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result1;
    }

    const displayRandomString = () =>{
       let randomStringContainer = document.getElementById('random_string');
        randomStringContainer.innerHTML =  generateRandomString(8);
    }

    let date = new Date();
        let Fecha_actual = String(date.getDate()).padStart(2, '0') + '/' + String(date.getMonth() + 1).padStart(2, '0') + '/' + date.getFullYear();
        var Codigo_de_control = encryptMessageRC4(generateRandomString(5),generateRandomString(9),false);
           document.getElementById('codigo_control').value=Codigo_de_control;
           var nombres = document.getElementById('Nombres').value;
           var Apellido = document.getElementById('apellido').value;
            new QRious({
                element: document.querySelector("#codigo"),
                value: Codigo_de_control + "|" + Fecha_actual + "|"  , // La URL o el texto
                size: 200,
                backgroundAlpha: 0, // 0 para fondo transparente
                foreground: "#000000", // Color del QR
                level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
            });
        </script>


<script>
     function check(valor) {
                var Datos = JSON.parse(valor);
                document.getElementById('clienteapellido').value=Datos['apellido'];
                document.getElementById('name').value=Datos['name'];

                document.getElementById('cliente_nit').value=Datos['ci'];
                document.getElementById('ci_cliente').value=Datos['ci'];



                     //document.getElementById('Apellido_Paterno').value=Datos['Apellido_P'];

            }
</script>

</body>

</html>

</body>
</html>
