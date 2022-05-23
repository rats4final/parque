@extends('layouts.nav')
@section('title', 'Registro Servicio')

@section('contenido')
    <div class="container mt-5">
        {{-- {!! Form::open(['route' => 'servicio.store', 'method' => 'POST', 'files' => true]) !!} --}}
        <form action="{{ route('servicio.create') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre_servicio" class="form-label">Nombre del Servicio</label>
                <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio">
            </div>
            <div class="mb-3">
                <label for="descripcion_servicio" class="form-label">Descripcion del Servicio</label>
                <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio">
            </div>
            <div class="mb-3">
                <label for="precio_servicio" class="form-label">Precio del Servicio</label>
                <input type="number" class="form-control" id="precio_servicio" name="precio_servicio">
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria Servicio</label>
                <select class="form-select" name="id_categoria" id="id_categoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen_servicio" class="form-label">Imagen del Servicio</label><br>
                <input class="dropify" type="file" name="imagen_servicio" id="imagen_servicio" data-allowed-file-extensions="jpg jpeg png svg webmb">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        {{-- {!! Form::close() !!} --}}
    </div>
    <script>
        $('.dropify').dropify({
            messages: {
        'default': 'Arrastre y suelte un archivo aqui o dele click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Quitar',
        'error':   'Ooops, something wrong happended.'
    }
        });
    </script>
@endsection
