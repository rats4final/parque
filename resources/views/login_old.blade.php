@extends('layouts.nav')
@section('title', 'Login')
@section('contenido')
<br>
<br>
    <div class="container d-flex justify-content-center">
        <form method="POST">
            @csrf {{--TOKEN--}}
            <h3 class="d-flex justify-content-center">Login</h3>
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
@endsection
