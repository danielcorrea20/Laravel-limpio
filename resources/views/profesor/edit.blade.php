<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- La llamada de node_modules de arriba es INCORRECTA. HAY QUE REVISAR -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>profesor UPDATE</h1>
    <main class="flex-container">
        <a href="{{ route('profesor_index') }}" class="btn btn-secondary">Atras</a>
        <div id="main" class="row">
            <form action="{{ route('profesor_update', $profesor->id ) }}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                @method('put')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input value="{{ $profesor->nombre }}" name="marca" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sergio">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input value="{{ $profesor->apellido }}" name="modelo" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fontan">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">DNI</label>
                    <input value="{{ $profesor->dni }}" name="fecha_matriculacion" type="date" class="form-control" id="exampleFormControlInput1" placeholder="12345">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                    <input value="{{ $profesor->fecha_nacimienton }}" name="fecha_matriculacion" type="date" class="form-control" id="exampleFormControlInput1" placeholder="12345">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                    <input value="{{ $profesor->telefono}}" name="user_id" type="number" class="form-control" id="exampleFormControlInput1" placeholder="500">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>