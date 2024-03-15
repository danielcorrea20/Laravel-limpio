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
<body>
    <h1 id="titulo">profesor UPDATE</h1>
    <main class="flex-container">
        <a href="{{ route('profesor_index') }}" class="btn btn-secondary">Atras</a>
        <div id="main" class="row">
            <form action="{{ route('profesor_update', $profesor->id ) }}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                @method('put')
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input value="{{ $profesor->nombre }}" name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sergio">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input value="{{ $profesor->apellidos }}" name="apellidos" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fontan">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">DNI</label>
                    <input value="{{ $profesor->DNI }}" name="DNI" type="text" class="form-control" id="exampleFormControlInput1" placeholder="11850755m">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                    <input value="{{ $profesor->fecha_nacimiento }}" name="fecha_nacimiento" type="date" class="form-control" placeholder="1982/05/23">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                    <input value="{{ $profesor->telefono}}" name="telefono" type="number" class="form-control" id="exampleFormControlInput1" placeholder="123456789">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
@endsection