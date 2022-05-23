$(document).ready( function () {
    $('#tablitas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf','print','csv'
        ]
    });
} );
