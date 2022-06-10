@extends('layouts.nav')
@section('title', 'Confirmacion de password')
@section('contenido')
<div class="mt-4 d-flex justify-content-center">
    <form method="POST" action="{{url('user/confirm-password')}}">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
