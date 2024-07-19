<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
     <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="mb-4">
                    <h1>Bienvenid@, {{ Auth::user()->name }}</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
                <div class="mt-5">
                    <form method="POST" action="{{ route('tasks.store') }}" class="p-4 border rounded">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Título:</label>
                            <input id="title" type="text" name="title" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha de vencimiento:</label>
                            <input id="date" type="date" name="date" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="mt-5">
                    <table class="table table-bordered table-hover">
                        <caption>Lista de Tareas</caption>
                        <thead class="table-light">
                            <tr>
                                <th scope="col">N° Registro</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha vencimiento</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->date }}</td>
                                <td>{{ $task->status }}</td>
                                <td>
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        @if ($task->status == 'Pendiente')
                                        <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $tasks->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
