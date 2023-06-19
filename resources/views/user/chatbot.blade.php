<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Chatbot del parque</title>
</head>
<body class="relative">
<div class="fixed bottom-0 w-full flex space-x-4 my-6 px-10">
    <input class="border border-gray-700 w-3/4 block p-2.5" type="text" name="message" id="message" placeholder="Escribe tu mensaje aqui">
    <button class="w-1/4 h-10 rounded-lg bg-blue-400" id="enviar" type="submit">Enviar</button>
</div>
<div class="overflow-auto border border-gray-800 h-96" id="historial">
    <!-- <p class="bg-green-600 m-3 rounded-lg w-max text-white p-2" id="respuesta"></p> -->
</div>


<script>
    document.getElementById('enviar').addEventListener('click', async()=>{
        const listaMensajes = document.getElementById("historial");
        const mensaje = String(document.getElementById("message").value);
        const data = {
            message: mensaje
        }
        console.log(data);
        let respuesta = await handleBotResponse(data);
        //console.log(respuesta.message);
        //document.getElementById('respuesta').innerHTML = respuesta.message;
        let textoMensaje = document.createTextNode(respuesta.message);
        let parrafo = document.createElement('p')
        parrafo.appendChild(textoMensaje);
        parrafo.classList.add("bg-green-600", "m-3", "rounded-lg", "w-max" ,"text-white", "p-2");
        listaMensajes.appendChild(parrafo);
    });

    async function handleBotResponse(data) {
        try {
            const response = await fetch("http://localhost:4000/chatbot",{
                method: "POST",
                mode: "cors",
                headers:{
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data)
            })
            const jsonData = await response.json();
            //console.log("Exito",jsonData);
            return jsonData;
        } catch (error) {
            console.error("Error",error);
        }

    }
</script>
</body>
</html>
