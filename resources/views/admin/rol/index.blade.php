<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>pussy </h1>
<form action="{{url('/rol')}}"  method="post">
@csrf
    <label > Nombre rol</label>
<input type="text" name="nombre_rol" >

<button type="submit"></button>

</form>



</body>
</html>
