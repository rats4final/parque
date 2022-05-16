@extends('layouts.nav')
@section('title', 'Registro Servicio')

@section('contenido')
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="container mt-5">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/user">Index</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de Servicio</li>
                    </ol>
                </nav>

                {!! Form::open(['route' => 'servicio.store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection
