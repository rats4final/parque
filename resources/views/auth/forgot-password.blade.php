<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>
<body>

    <div class="container mt-4 d-flex justify-content-center">
        <h5>Reestablecimiento de contraseña</h5>
    </div>
    @if (session('status'))
        <div class="container mt-4 d-flex justify-content-center alert alert-success role=" alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('password.request') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                    aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie</div>
            </div>
            {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div> --}}
            <button type="submit" class="btn btn-primary">Reestablecer</button>
        </form>
    </div>
</body>

</html>
