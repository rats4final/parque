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

        let Nombres = document.getElementById('Nombres').value; //pa ver que tal
        let Apellido = document.getElementById('apellido').value;

        generatePDF(Nombres,Apellido);

    });

});


async function generatePDF(Nombres ,Apellido, Datos=[] ){

    const image = await loadImage("/storage/qrcodes/formulario.jpg");


    var matriz = [170, 500];

    const pdf = new jsPDF('p', 'pt', matriz);

    pdf.addImage(image , 'PNG',0,0, 613 ,795);

    pdf.setFontSize(10);
    pdf.text("FACTURA" , 66 ,50)

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,60);

    pdf.setFontSize(9);
    pdf.text("NIT:" , 10 ,72);

    pdf.setFontSize(8);
    pdf.text("FACTURA Nro:" , 10 ,82);

    pdf.setFontSize(8);
    pdf.text("AUTORIZACION:" , 10 ,92);

    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,100);


    pdf.setFontSize(9);
    pdf.text("FECHA:" , 10 ,112);

    pdf.setFontSize(8);
    pdf.text("NOMBRES:" , 10 ,122);
    /* Para marc */
    //pdf.text(`NOMBRES:${Nombres}` , 10 ,122);
    pdf.setFontSize(8);
    pdf.text("APELLIDOS:" , 10 ,132);
    pdf.setFontSize(8);
    pdf.text("NIT/CI:" , 10 ,143);
    pdf.setFontSize(10);
    pdf.text("----------------------------------------------" , 10 ,152);
    /* Aquí deberías añadir los datos de la factura 
    datos.foreach(element =>  {}) */



    pdf.setFontSize(7);
    pdf.text("CODIGO DE CONTROL:" , 10 ,325);
    pdf.setFontSize(7);e(7);
    pdf.text("FECHA LIMITE DE EMISION:", 10, 335);    pdf.text("FECHA LIMITE DE EMISION:" , 10 ,335)



    pdf.text(Nombres , 115 ,232);    pdf.text(Nombres , 115 ,232);

    pdf.setFontSize(10);
    pdf.text(Apellido , 15 ,232)


    pdf.text("----------------------------------------------" , 10 ,318);


    pdf.addImage(document.getElementById('codigo').src , 'PNG',34,340, 100 ,100);


    pdf.setFontSize(7);
    pdf.text( "\"ESTA FACTURA CONTRIBUYE AL DESARROLLO" , 4 ,460)

    pdf.setFontSize(7);
    pdf.text( "DEL PAIS. EL SU USO ILICITO DE ESTA SERA" ,  6 ,470)

    pdf.setFontSize(7);
    pdf.text( "SANCIONADO DE ACUERDO A LEY \"" ,  6 ,480)

    pdf.save("Factura .pdf");







}
