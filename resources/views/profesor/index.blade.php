@extends('layouts.app')
@section('header')
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
</header>
<body>
<a href="{{route('file_index')}}" class="btn btn-success">Subir fichero</a><!--enlace temporal para ir a entregas -->

<a href="{{ route('profesor_create') }}" class="btn btn-secondary">Crear</a>
<h1 id="titulo">PROFESORES DEL CENTRO IMF</h1>
    <table id="example1" class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">DNI</th>
        <th scope="col">Fecha</th>
        <th scope="col">Teléfono</th>
        <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesores as $profesor)
            <tr>
                <th scope="row">{{ $profesor->id }}</th>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->apellidos }}</td>
                <td>{{ $profesor->DNI }}</td>
                <td>{{ $profesor->fecha_nacimiento }}</td>
                <td>{{ $profesor->telefono }}</td>
           
                <td>
                <form method="POST" action="{{ route('profesor_destroy', $profesor->id) }}" id="formularioEliminar">
                    @csrf @method('delete')
                    <input class ="btn btn-danger"type="submit" id="eliminarFicha"  value="Eliminar">                                        
                </form>
                <a class ="btn btn-warning" href="{{ route('profesor_edit', $profesor->id) }}">  Editar </a>
                </td>
            </tr>
            @endforeach
    </tbody>
    </table>
</body>
<script>


  </script>
</html>
@endsection
