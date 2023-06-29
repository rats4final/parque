import json
import nltk
from nltk.chat.util import Chat, reflections
from flask import Flask , jsonify,request
from flask_cors import CORS, cross_origin
app = Flask(__name__) 


pairs = [
    [
        r"hola|hey|ola|buenas|hey",
       ["¡Bienvenido al parque de atracciones! ¿En qué puedo ayudarte?", "¡Hola! ¿Cómo estás?", "¡Hola! ¿Cómo puedo ayudarte el día de hoy?"]
    ],
    [
        r"(.*)estoy bien(.*)",
        ["Me alegra saber que estás bien", "Genial, ¿en qué puedo ayudarte hoy?"]
    ],
    [
        r"(.*)quiero aprender(.*)",
        ["¿Qué te gustaría aprender? Puedo darte información sobre varios temas.", "Estoy aquí para ayudarte, ¿qué tema te interesa?"]
    ],
    [
        r"(.*)ayuda(.*)",
        ["Claro, ¿en qué puedo ayudarte?", "Estoy aquí para ayudarte. ¿Qué necesitas?"]
    ],
    [
        r"(.*)adios(.*)|chao|bye|nos vemos",
        ["Adiós, que tengas un buen día.", "¡Hasta pronto! Si necesitas algo, no dudes en volver."]
    ],

    [
        r"(.*)horario(.*)",
       ["El parque abre de 10:00 a 22:00.", "Estamos abiertos de 10:00 a 22:00."]
    ],

    [
        r"(.*)precio entradas(.*)",
    ["El precio de la entrada general es de 30Bs. Niños menores de 3 años entran gratis.", "Las entradas generales cuestan 30€. La entrada es gratuita para niños menores de 3 años."]
    ],

    [
        r"(.*)descuentos(.*)",
        ["Hay descuentos disponibles para estudiantes, personas mayores y grupos.", "Ofrecemos descuentos para estudiantes, personas mayores y grupos."]
    ],

[
r"(.*)baño(.*)|aseo",
["Los baños están ubicados en diferentes zonas del parque, busca el símbolo del baño en el mapa.", "Puedes encontrar baños en varias áreas del parque, consulta el mapa para encontrar el más cercano."]
],

[
r"(.*)comer(.*)calor",
["Te recomendamos probar los helados, smoothies y ensaladas de frutas en los puestos del parque.", "Cuando hace calor, disfruta de helados, smoothies y ensaladas de frutas en nuestros puestos."]
],

[
r"(.*)comer(.*)frio",
["Te recomendamos probar las cafeterias y puestos de frituras del parque.", "Cuando hace frio, disfruta de la comida frita y los cafés que nuestro parque ofrece."]
],

[
r"(.*)mejor(.*)comida(.*)",
["Todos los restaurantes del parque ofrecen buenos platillos y bebidas. Consulta los menús para elegir la comida de tú preferencia."]
],

[
r"(.*)atracciones menos filas",
["Las atracciones acuáticas y las menos conocidas suelen tener menos filas.", "Suele haber menos filas en las atracciones acuáticas y en las atracciones menos populares."]
],

[
r"(.*)atracciones peligrosas(.*)|(.*)peligro(.*)|(.*)peligroso(.*)|(.*)riesgo",
["Todas nuestras atracciones y las instalaciones del parque son seguras, sin embargo consulta los requerimientos para subir a cada atracción.", "Todas nuestras instalaciones son seguras. Verifica los señalamientos de cada atracción para obtener información específica."]
],

[
r"(.*)edad(.*)",
["La edad mínima para algunas atracciones es de 3 años, pero varía según la atracción.", "Algunas atracciones tienen restricciones de edad. Verifica las señales de cada atracción para obtener información específica."]
],

[
r"(.*)altura(.*)",
["Hay restricciones de altura en algunas atracciones. Consulta las señales de cada atracción para obtener información específica.", "Algunas atracciones tienen restricciones de altura. Verifica las señales de cada atracción para obtener detalles."]
],

[
r"(.*)atracciones acuáticas(.*)",
["Tenemos varias atracciones acuáticas, como toboganes, piscinas y ríos lentos.", "El parque cuenta con toboganes, piscinas y ríos lentos entre sus atracciones acuáticas."]
],

[
r"(.*)atracciones acuaticas(.*)",
["Tenemos varias atracciones acuáticas, como toboganes, piscinas y ríos lentos.", "El parque cuenta con toboganes, piscinas y ríos lentos entre sus atracciones acuáticas."]
],

[
r"(.*)almacenar cosas(.*)",
["Hay consignas disponibles cerca de la entrada del parque.", "Puedes guardar tus cosas en las consignas ubicadas cerca de la entrada."]
],

[
r"(.*)restaurantes(.*)",
["Hay varios restaurantes en el parque que ofrecen una variedad de opciones de comida.", "El parque cuenta con restaurantes de distintos tipos para satisfacer tus necesidades culinarias."]
],

[
r"(.*)vegetariano(.*)|(.*)vegetarianas(.*)",
["Muchos de nuestros restaurantes ofrecen opciones vegetarianas. Consulta los menús en cada restaurante.", "Sí, hay opciones vegetarianas disponibles en varios restaurantes del parque."]
],

[
r"(.*)atracciones(.*)niños(.*)",
["Tenemos varias atracciones para niños, como el carrusel y la zona de juegos.", "Los niños pueden disfrutar del carrusel, la zona de juegos y otras atracciones adaptadas."]
],

[
r"(.*)atracciones(.)adultos(.*)",
["Para adultos, contamos con montañas rusas, la rueda de la fortuna y juegos de destreza.", "Los adultos pueden disfrutar de montañas rusas, la rueda de la fortuna y otros juegos de habilidad."]
],

[
r"(.*)atracciones(.*)menos(.*)filas(.*)",
["Las atracciones con menos filas suelen ser los juegos de destreza y los espectáculos en vivo.", "Los juegos de habilidad y los espectáculos en vivo suelen tener menos filas que las atracciones principales."]
],

[
r"(.)parque(.)mapa(.*)",
["Puedes encontrar mapas del parque en la entrada o en nuestra página web.", "Tenemos mapas disponibles en la entrada del parque y en nuestro sitio web."]
],

[
r"(.*)lockers(.)|(.)taquillas(.)",
["Hay lockers disponibles cerca de la entrada por una tarifa adicional.", "Ofrecemos taquillas cerca de la entrada, su uso tiene un costo adicional."]
],

[
r"(.*)estacionamiento(.)",
["Contamos con un amplio estacionamiento gratuito para nuestros visitantes.", "El estacionamiento es gratuito y está disponible para todos nuestros visitantes."]
],

[
r"(.*)transporte(.)público(.*)",
["El parque es accesible en transporte público, consulta nuestra página web para más detalles.", "Puedes llegar al parque en transporte público. Revisa nuestra página web para más información."]
],

[
r"(.*)transporte(.)publico(.*)",
["El parque es accesible en transporte público, consulta nuestra página web para más detalles.", "Puedes llegar al parque en transporte público. Revisa nuestra página web para más información."]
],

[
r"(.*)política(.*)animales(.*)|(.*)mascotas(.*)",
["Lo sentimos, no se permiten mascotas en el parque, excepto los perros guía para personas con discapacidades visuales.", "Las mascotas no están permitidas en el parque, a excepción de los perros guía para personas con discapacidades visuales."]
],

[
r"(.*)servicios(.*)discapacidad(.*)|(.*)accesibilidad(.*)",
["El parque está adaptado para personas con discapacidades y ofrecemos sillas de ruedas para alquilar.", "Nuestras instalaciones son accesibles y disponemos de sillas de ruedas para alquilar."]
],

[
r"(.*)seguridad(.*)|(.*)medidas(.*)prevención(.*)",
["Contamos con personal de seguridad y medidas de prevención como detectores de metales en la entrada.", "Tenemos personal de seguridad y medidas preventivas como detectores de metales en la entrada."]
],

[
r"(.*)protocolos(.*)salud(.*)|(.*)covid(.*)",
["Seguimos las pautas de salud recomendadas, como uso de mascarillas y disponibilidad de desinfectante de manos.", "Nos adherimos a las recomendaciones de salud, incluyendo el uso de mascarillas y la provisión de desinfectante de manos."]
],

[
r"(.*)pases(.*)rápidos(.*)|(.*)fila(.*)rápida(.*)",
["Ofrecemos pases rápidos para saltarte las filas en ciertas atracciones por un costo adicional.", "Tenemos pases rápidos disponibles para evitar las filas en atracciones seleccionadas, estos tienen un costo adicional."]
],

[
r"(.*)pérdida(.*)objetos(.*)|(.*)objetos(.*)perdidos(.*)",
["Si has perdido algo, por favor dirígete a nuestra oficina de objetos perdidos.", "Visita nuestra oficina de objetos perdidos si has extraviado algún artículo."]
],

[
r"(.*)perdí(.*)|(.*)perdi(.*)hijo(.*)",
["si te extraviaste o te separaste de tú familia o grupo acercate al personal de seguridad más cercano y explícale tú situación."]
],

    [  
    r"(.*)tienda(.*)recuerdo(.*)|(.*)souvenirs(.*)|(.*)tiendas(.*)recuerdos(.*)|",
    ["Tenemos tiendas de recuerdos en diferentes áreas del parque, como ser en la salida del parque.", "Encontrarás tiendas de souvenirs en varias zonas del parque, por ejemplo en la salida del parque."]
    ],

    [
    r"(.*)primeros(.)auxilios(.*)",
    ["Contamos con un centro de primeros auxilios para atender cualquier emergencia médica.", "Tenemos un centro de primeros auxilios en el parque para emergencias médicas."]
    ],

    [
        r"(.*)eventos(.)especiales(.*)",
        ["El parque realiza eventos especiales durante todo el año, consulta nuestra página web para conocer el calendario.", "Realizamos eventos especiales a lo largo del año. Puedes revisar nuestro calendario en nuestra página web."]
    ],

    [
        r"(.*)cómo llegar(.*)",
        ["Nuestro parque de atracciones se encuentra en el centro de la ciudad. Puedes llegar en auto, transporte público o en taxi. Si necesitas más detalles sobre cómo llegar, solo pregunta.", "Hay varias formas de llegar al parque, incluyendo auto, transporte público o taxi. Si necesitas más detalles sobre cómo llegar, solo pregunta."]
    ],
    [
        r"(.*)atracciones más populares(.*)",
        ["Tenemos muchas atracciones emocionantes y populares en el parque, pero algunas de las más populares incluyen nuestra montaña rusa más alta, nuestra atracción de agua más grande y nuestro espectáculo de luces y sonido por la noche. ¿Te gustaría saber más sobre estas atracciones?", "Tenemos muchas atracciones emocionantes y populares en el parque, pero algunas de las más populares incluyen nuestra montaña rusa más alta, nuestra atracción de agua más grande y nuestro espectáculo de luces y sonido por la noche. ¿Te gustaría saber más sobre estas atracciones?"]
    ],
    [
        r"(.*)pases de temporada(.*)",
        ["Sí, ofrecemos pases de temporada que te permiten visitar el parque durante todo el año. Puedes comprarlos en línea o en la taquilla.", "¡Por supuesto! Ofrecemos pases de temporada que te permiten visitar el parque durante todo el año. Puedes comprarlos en línea o en la taquilla."]
    ],

     [
        r"(.*)cancelación de entradas(.*)",
        ["Lo sentimos, no ofrecemos cancelaciones de entradas. Si tienes alguna pregunta sobre tus entradas puedes contactarte con el número de ayuda al usuario que se encuentra en nuestra página web"]
    ],

    [
        r"(.*)accesibilidad(.*)",
        ["Nos esforzamos por hacer que todas nuestras atracciones sean accesibles para personas con discapacidades. Tenemos rampas, ascensores y sillas de ruedas disponibles en todo el parque. Si necesitas asistencia especial, por favor avísanos con anticipación y haremos todo lo posible para ayudarte.", "Nos esforzamos por hacer que todas nuestras atracciones sean accesibles para personas con discapacidades. Tenemos rampas, ascensores y sillas de ruedas disponibles en todo el parque. Si necesitas asistencia especial, por favor avísanos con anticipación y haremos todo lo posible para ayudarte."]
    ],

    [
        r"(.*)comprar entradas(.*)",
        ["Puedes comprar tus entradas en línea a través de nuestro sitio web o en la taquilla del parque. Te recomendamos comprar tus entradas en línea para evitar filas y para aprovechar cualquier descuento disponible.", "Puedes comprar tus entradas en línea a través de nuestro sitio web o en la taquilla del parque. Te recomendamos comprar tus entradas en línea para evitar filas y para aprovechar cualquier descuento disponible."]
    ],

]

@app.route('/chatbot', methods=['POST'])
@cross_origin()
def responder_mensaje():
    Peticion = request.json 
    Mensaje = Peticion['message']
    chatbot = Chat(pairs, reflections)
    return json.dumps({"message":str(chatbot.respond(Mensaje))},ensure_ascii=False)

if __name__ == '__main__':
    #app.run(debug=True,port=8000,host='192.168.1.110')
    app.run(debug=True,port=4000)
