@extends('layouts.nav')
@section('title', 'Login')
@section('contenido')
<div class="mt-4 d-flex justify-content-center">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
