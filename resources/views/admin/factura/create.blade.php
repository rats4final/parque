<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type='text/javascript' src='js/AllegedRC4.js'></script>
    <script src="/storage/qrcodes/app.js"></script>
    <script src="/storage/qrcodes/jspdf.min.js"></script>
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.min.js"></script>

    <title>Ventas</title>
</head>
<body>

    <h1> Solo no borres los hidden ni el script el resto borralo si quieres hasta el controlador :3</h1>



    <form id="form" action="{{ url('/factura') }}" method="post">
        @csrf
        <input type="hidden" id="Nombres" name="name" value="{{Auth::user()->name}}">
        <input type="hidden" id="apellido" name="apellido" value="{{Auth::user()->apellido}}">
        <input type="hidden" id="Codigo_control">
        <button type="submit">Subir</button>
    </form>

    <img alt="Código QR" id="codigo">
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


    var Codigo_de_control = encryptMessageRC4(generateRandomString(5),generateRandomString(9),false);
       document.getElementById('Codigo_control').value=Codigo_de_control;
       var nombres = document.getElementById('Nombres').value;
       var Apellido = document.getElementById('apellido').value;
		new QRious({
			element: document.querySelector("#codigo"),
			value: a , // La URL o el texto
			size: 200,
			backgroundAlpha: 0, // 0 para fondo transparente
			foreground: "#000000", // Color del QR
			level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
		});
	</script>
</body>
</html>

