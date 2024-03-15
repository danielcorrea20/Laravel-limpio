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
    <h1 id="titulo">profesor CREATE</h1>
    <main class="flex-container">
        <a href="{{ route('profesor_index') }}" class="btn btn-secondary">Atras</a>
        <div id="main" class="row">
            <form action="{{ route('profesor_store') }}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sergio">
                    @error('nombre')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">apellidos</label>
                    <input name="apellidos" value="{{ old('apellidos') }}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fontan">
                    @error('apellidos')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">DNI</label>
                    <input name="DNI" value="{{ old('DNI') }}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="11850755M">
                    @error('DNI')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                    <input name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}"class="form-control" placeholder="23/05/1982">
                    @error('fecha_nacimiento')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                    <input name="telefono" type="number" value="{{ old('telefono') }}"class="form-control" id="exampleFormControlInput1" placeholder="123456789">
                    @error('telefono')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
</body>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
</html>
@endsection
