<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title> {{-- we no mames --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- JQuery --}}
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js">
    </script>
    {{-- Datatables --}}
    {{-- Dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Dropify --}}

    {{-- Estilos side --}}
    <link href="{{URL::asset('css/styles_nav.css')}}" rel="stylesheet"/>
    {{-- Estilos side --}}

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    {{-- Bootstrap Icons --}}
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Monte Mayor</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('/')}}"><i class="bi bi-house-door"></i>Inicio</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="{{ url('/home') }}"><i class="bi bi-speedometer2">Dashboard</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('factura.index')}}"><i class="bi bi-ticket-perforated">Ventas</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('rol.index')}}"><i class="bi bi-person-plus"></i>Roles</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('servicio.index')}}"><i class="bi bi-play"></i>Servicios</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('categoria.index')}}"><i class="bi bi-share"></i>Categorias Servicios</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('usuario_opera_servicio.index')}}"><i class="bi bi-tools"></i>Operadores</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('user.index')}}"><i class="bi bi-people"></i></i>Usuarios</i></a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="bi bi-bookmark"></i>Acerca de</a>

            </div>


        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-outline-primary" id="sidebarToggle"><i class="bi bi-list-ul"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                            <form action="{{route('logout')}}" method="POST"> @csrf <button type="submit" class="btn btn-secondary btn-sm">Salir</button></form>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('contenido')
            </div>
        </div>
    </div>

    <script src="{{URL::asset('js/scripts_nav.js')}}"></script>
    <script src="{{URL::asset('js/tables.js')}}"></script> {{--usar este metodo siempre--}} {{-- Datatables --}}
    @yield('scripts')
</body>

</html>
