<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="/storage/qrcodes/app.js"></script>
    <script src="/storage/qrcodes/jspdf.min.js"></script>
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.min.js"></script>

    <title>Document</title>
</head>
<body>


    <form id="form" action="{{ url('/factura') }}" method="post">

        @csrf

        <input type="hidden" id="Nombres" name="name" value="{{Auth::user()->name}}">
        <input type="hidden" id="apellido" name="apellido" value="{{Auth::user()->apellido}}">
        <button type="submit">Subir</button>

    </form>

    <img alt="Código QR" id="codigo">
	<script>

       var nombres = document.getElementById('Nombres').value;
       var Apellido = document.getElementById('apellido').value;

		new QRious({
			element: document.querySelector("#codigo"),
			value: "Persona responsable: "+ nombres + " " +Apellido , // La URL o el texto
			size: 200,
			backgroundAlpha: 0, // 0 para fondo transparente
			foreground: "#000000", // Color del QR
			level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
		});
	</script>








</body>
</html>
