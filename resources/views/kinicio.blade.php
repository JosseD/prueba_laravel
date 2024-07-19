<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Styles -->

</head>

<body>
    <div class="row g-0 text-center">
        <div class="col-sm-6 col-md-8">

        </div>
        <div class="col-6 col-md-4">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Iniciar sesión</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
            </form>

            <!-- Modal -->
            <div class="modal fade modal-dialog modal-dialog-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('usuarios.store')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">N° documento</label>
                                    <input name="dni" class="form-control" id="dni" aria-describedby="emailHelp">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                                        <input name="name" class="form-control" id="name">
                                    </div><button type="submit" class="btn btn-primary">Save changes</button>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>