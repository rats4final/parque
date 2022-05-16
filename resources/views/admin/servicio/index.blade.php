@include('layouts.nav')
<h1>Index Servicios</h1>

<div class="table-responsive">
    <table id="tablitas" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Codigo del Servicio</th>
                <th>Nombre del Servicio</th>
                <th>Descripción del servicio</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <th>{{ $servicio->id_servicio }}</th>
                    <th>{{ $servicio->codigo }}</th>
                    <td>{{ $servicio->nombre_servicio }}</td>
                    <td>{{ $servicio->descripcion_servicio }}</td>
                    <td>{{ $servicio->precio_servicio }}</td>
                    <td>{{ $servicio->categorias->nombre_categoria}}</td>
                    <td><a class="btn btn-success" href="{{ route('servicio.edit', $servicio) }}" title="Editar"></a></td>
                    {{-- <td><a class="btn btn-danger" href="{{ route('servicio.destroy', $servicio) }}" title="Eliminar"></a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="js/tables.js">
</script>
