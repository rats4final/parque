@include('layouts.nav')
<h1>Index Servicios</h1>

<div class="table-responsive">
    <table id="tablitas" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del Servicio</th>
                <th>Descripción del servicio</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <th scope="row">{{ $servicio->nombre_servicio }}</th>
                    <td>{{ $servicio->nombre_servicio }}</td>
                    <td>{{ $servicio->descripcion_servicio }}</td>
                    <td>{{ $servicio->precio_servicio }}</td>
                    <td>{{ $servicio->imagen_servicio }}</td>
                    <td>XD</td>
                    <td style="width: 50px;">
                        <a title="Editar"> </a>
                        <button type="submit" title="Eliminar">
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="js/tables.js">
</script>
