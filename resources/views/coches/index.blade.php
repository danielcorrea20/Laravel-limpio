<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- Oficial --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap.css"> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- La llamada de node_modules de arriba es INCORRECTA. HAY QUE REVISAR -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<a href="{{ route('coches-create') }}" class="btn btn-secondary">Crear</a>
    <table id="example1" class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">MArca</th>
        <th scope="col">Modelo</th>
        @role('Alumno')
            <th scope="col">Fecha</th>
        @endrole
        @role('Profesor')
            <th scope="col">Usuario</th>
        @endrole
        <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coches as $coche)
            <tr>
                <th scope="row">{{ $coche->id }}</th>
                <td>{{ $coche->marca }}</td>
                <td>{{ $coche->modelo }}</td>
                @role('Alumno')
                    <td>{{ $coche->fecha_matriculacion }}</td>
                @endrole
                @role('Profesor')
                    <td>{{ $coche->user_id }}</td>
                @endrole
                <td>
                <form method="POST" action="{{ route('coches-destroy', $coche->id) }}" id="formularioEliminar">
                    @csrf @method('delete')
                    <input class ="btn btn-danger"type="submit" id="eliminarFicha"  value="Eliminar">                                        
                </form>
                <a class ="btn btn-warning" href="{{ route('coches-edit', $coche->id) }}">  Editar </a>
                </td>
            </tr>
            @endforeach
    </tbody>
    </table>
</body>
<script>
    

  </script>
</html>
