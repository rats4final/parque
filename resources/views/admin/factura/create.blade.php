<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <div class="visible-print text-center">
        {!! QrCode::size(500)->generate(Request::url()); !!}
        <p>Escanéame para volver a la página principal.</p>
    </div>
    {{Auth::user()}} --}}


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="/storage/qrcodes/app.js"></script>
    <script src="/storage/qrcodes/jspdf.min.js"></script>


    <form id="form" action="{{ url('/factura') }}" method="post">

        @csrf

        <input type="hidden" id="Nombres" name="name" value="{{Auth::user()->name}}">
        <input type="hidden" id="apellido" name="apellido" value="{{Auth::user()->apellido}}">

        <button type="submit">Subir</button>

    </form>



</body>
</html>
