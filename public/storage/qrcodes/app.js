function loadImage(url){
    return new Promise(resolve =>{
        const xhr = new XMLHttpRequest();
        xhr.open('GET',url, true);
        xhr.responseType = "blob";
        xhr.onload = function(e){
            const reader = new FileReader();
            reader.onload = function(event){
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}





let sinaturePad = null;
//posible error por que esto es para la firma
window.addEventListener( 'load' , async ()=> {

    const form = document.querySelector('#form');

    form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let Nombres = document.getElementById('Nombres').value; //pa ver que tal    123
        let Apellido = document.getElementById('apellido').value;


        let Codigo_Control = document.getElementById('codigo_control').value;

        let Total = document.getElementById('total_pagar').value;







        let cliente_name = document.getElementById('name').value;

        let cliente_apellido =  document.getElementById('clienteapellido').value;

        let ciente_nit_ci = document.getElementById('cliente_nit').value;

        var ultima_id = document.getElementById('ultima').value;

        var ultima_id1 = Number(ultima_id) + 1;





        var arrayPrecio_unitario = new Array();
        var precio_unitario = document.getElementsByClassName('precio_unitario');

        precios_unitario = [].map.call(precio_unitario,function(precio_unitario){
            arrayPrecio_unitario.push(precio_unitario.value);

        });

        arrayPrecio_unitario.forEach(function(valores){
            console.log("el dato es"+ valores);

        });
        //para decuento

        var arrayDescuento = new Array();
        var Descuento = document.getElementsByClassName('cantidad');

        Descuentos = [].map.call(Descuento,function(Descuento){
            arrayDescuento.push(Descuento.value);

        });

        arrayDescuento.forEach(function(ValorDescuento){
            console.log("el dato es"+ ValorDescuento);

        });

        //para cantidad

        var arrayCantidad = new Array();
        var Cantidad = document.getElementsByClassName('cantidad');

        Cantidades = [].map.call(Cantidad,function(Cantidad){
            arrayCantidad.push(Cantidad.value);

        });

        arrayCantidad.forEach(function(ValorCantidad){
            console.log("el dato es"+ ValorCantidad);

        });


//servicio
        var arrayServicio = new Array();
        var Servicio = document.getElementsByClassName('servicio');

        // Servicios = [].map.call(Servicio,function(Servicio){
        //     arrayServicio.push(Servicio.value);

        // });

        arrayServicio.forEach(function(ValorServicio){
            console.log("el dato es"+ ValorServicio);

        });


        //servicio


        $('.FechaRegistro').each(function(index){

            arrayServicio.push($(this).text());


       });

//Sub total

var arraySub_total = new Array();
       $('.sub_total').each(function(index){

        arraySub_total.push($(this).text());


   });


        generatePDF(Nombres,Apellido,Codigo_Control,arrayPrecio_unitario,arrayCantidad,arrayServicio,arrayDescuento,arraySub_total,Total,cliente_name,cliente_apellido,ciente_nit_ci,ultima_id1);

    });

});


function agregarMesesFecha(date , n =1){
    return new Date(date.setMonth(date.getMonth()+n));
}


async function generatePDF(Nombres,Apellido,Codigo_Control,arrayPrecio_unitario,arrayCantidad,arrayServicio,arrayDescuento,arraySub_total,Total,cliente_name,cliente_apellido,ciente_nit_ci,ultima_id1){








    const image = await loadImage("/storage/qrcodes/formulario.jpg");

//

    let datos_size = arrayPrecio_unitario.length * 10;


    var matriz = [170, 467 + datos_size];

    const pdf = new jsPDF('p', 'pt', matriz);


    // let date = new Date();
    // let Fecha_actual = String(date.getDate()).padStart(2, '0') + '/' + String(date.getMonth() + 1).padStart(2, '0') + '/' + date.getFullYear();

    let date = new Date();
    let Fecha_actual = date.getFullYear() + '/' + String(date.getMonth() + 1).padStart(2, '0') + '/' + String(date.getDate()).padStart(2, '0');



    document.getElementById('fecha_emision').value = Fecha_actual;

    document.getElementById('autorizacion').value =387401100030127 ;

    let fecha_emision1 = agregarMesesFecha(date , 3)

    let fecha_emision = fecha_emision1.getFullYear() + '/' + String(fecha_emision1.getMonth() + 1).padStart(2, '0') + '/' +  String(fecha_emision1.getDate()).padStart(2, '0');

    document.getElementById('fecha_maxima_emision').value = fecha_emision;

    let hora  =String( date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds());




    pdf.addImage(image , 'PNG',0,0, 613 ,795);

    pdf.setFontSize(8);
    pdf.text("MONTE MAYOR BOLIVIA SRL" , 33 ,15)

    pdf.setFontSize(7);
    pdf.text("LA PAZ -- BOLIVIA" , 57 ,30)

    pdf.setFontSize(10);
    pdf.text("FACTURA" , 66 ,50)

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,60);

    pdf.setFontSize(8);
    pdf.text("NIT:154094027" , 10 ,72);

    pdf.setFontSize(8);
    pdf.text(`FACTURA Nro:${ultima_id1}`, 10 ,82);

    pdf.setFontSize(8);
    pdf.text("AUTORIZACION Nro : 387401100030127 " , 10 ,92);


    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,100);


    pdf.setFontSize(9);
    pdf.text(`FECHA: ${Fecha_actual}` , 10 ,112);




    pdf.setFontSize(9);
    pdf.text(`HORA: ${hora}` , 94 ,112);

    pdf.setFontSize(8);
    pdf.text(`NOMBRES:  ${cliente_name} `, 10 ,122);

    pdf.setFontSize(8);
    pdf.text(`APELLIDOS: ${cliente_apellido}` , 10 ,132);

    pdf.setFontSize(8);
    pdf.text(`NIT/CI: ${ciente_nit_ci}` , 10 ,143);



    pdf.setFontSize(7);
    pdf.text("======================================" , 10 ,152);


    pdf.setFontSize(8);
    pdf.text("CANT" , 10 ,161);

    pdf.setFontSize(8);
    pdf.text("SERVI" , 37 ,161);

    pdf.setFontSize(8);
    pdf.text("DESC" , 74 ,161);

    pdf.setFontSize(8);
    pdf.text("P/U" , 100 ,161);

    pdf.setFontSize(8);
    pdf.text("SUB/T" , 134 ,161);

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,170);


    // arrayPrecio_unitario.foreach((e, it) => {
    //     pdf.text(e.nombre, 10 ,162 + (it * 10));
    //     pdf.text(e.yoquese.splice(0,10), 25 ,162 + (it * 10));
    // });

    //Para decuebto

    arrayDescuento.forEach(function(ValorDescuento, it){
        pdf.setFontSize(8);
        pdf.text(ValorDescuento, 82 ,182 + (it * 10));

    });

//cantidad
    arrayCantidad.forEach(function(ValorCantidad, it){
        pdf.setFontSize(8);
        pdf.text(ValorCantidad, 15 ,182 + (it * 10));

    });

    //para servicio

    arrayServicio.forEach(function(ValorServicio, it){

        //console.log(ValorServicio);

        pdf.setFontSize(8);

    pdf.text(ValorServicio.slice(0,5), 36 ,182 + (it * 10));

    });


//precio unitario
    arrayPrecio_unitario.forEach(function(valores, it){


pdf.setFontSize(8);
        pdf.text(valores, 98 ,182 + (it * 10));

    });

    //precio sub total


    arraySub_total.forEach(function(ValorSub, it){

        pdf.text(ValorSub.slice(2,-1), 132 ,182 + (it * 10));

    });


    pdf.setFontSize(10);
    pdf.text(`Total a Pagar : ${Total}` , 50,200 + datos_size);

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,210 + datos_size);

    pdf.setFontSize(7);
    pdf.text(`CODIGO DE CONTROL:${Codigo_Control}` , 10 ,220+ datos_size)


    pdf.setFontSize(7);
    pdf.text(`FECHA LIMITE DE EMISION:${fecha_emision}` , 10 ,230+ datos_size)



    pdf.addImage(document.getElementById('codigo').src , 'PNG',40,240+ datos_size, 90 ,90);

    pdf.setFontSize(9);
    pdf.text(`CAJERO: ${Nombres} ${Apellido}`, 10 ,351+ datos_size)


    pdf.setFontSize(7);
    pdf.text( "\"ESTA FACTURA CONTRIBUYE AL DESARROLLO" , 4 ,365+ datos_size)

    pdf.setFontSize(7);
    pdf.text( "DEL PAIS. EL SU USO ILICITO DE ESTA SERA" ,  6 ,376+ datos_size)

    pdf.setFontSize(7);
    pdf.text( "SANCIONADO DE ACUERDO A LEY \"" ,  6 ,387+ datos_size)


    pdf.setFontSize(7);
    pdf.text( "LEY N° 453: EL PROVEEDOR DEBE BRINDAR" , 4 ,397+ datos_size)

    pdf.setFontSize(7);
    pdf.text( "ATENCIÓN SIN DISCRIMINACIÓN, CON RESPETO" ,  4 ,407+ datos_size)

    pdf.setFontSize(7);
    pdf.text( "CALIDEZ Y CORDIALIDAD A LOS USUARIOS Y" ,  4 ,417+ datos_size)

    pdf.setFontSize(7);
    pdf.text( "CONSUMIDORES." ,  4 ,427+ datos_size)

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,437+ datos_size);

    pdf.setFontSize(7);
    pdf.text( "GRACIAS POR SU PREFERENCIA" ,  27 ,447+ datos_size)



    pdf.save("Factura .pdf");


    form.submit();







}
