$(document).ready( function () {
    $('#tablitas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar',
            },
            {
                extend: 'excel',
                text: 'Hoja de Excel',
                title: 'Tabla_Excel'
            },
            {
                extend: 'pdf',
                text: 'PDF',
                title: 'PDF_tabla'
            },
            {
                extend: 'print',
                text: 'Imprimir',
            },
            {
                extend: 'csv',
                text: 'CSV',
            },
            {
                extend: 'colvis',
                text: 'Ocultar Columnas'
            },

        ],
        "aLengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "Todos"]
        ],
        "iDisplayLength": 10,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "search": "Busqueda",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro ningun registro",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
    });
} );
