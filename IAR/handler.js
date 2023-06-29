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