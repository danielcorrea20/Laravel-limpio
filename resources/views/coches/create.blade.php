<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- La llamada de node_modules de arriba es INCORRECTA. HAY QUE REVISAR -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>coches CREATE</h1>
    <main class="flex-container">
        <a href="{{ route('coches-index') }}" class="btn btn-secondary">Atras</a>
        <div id="main" class="row">
            <form action="{{ route('coches-store') }}" method="POST">
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
                    <label for="exampleFormControlInput1" class="form-label">Marca</label>
                    <input name="marca" value="{{ old('marca') }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sergio">
                    @error('marca')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">modelo</label>
                    <input name="modelo" value="{{ old('modelo') }}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fontan">
                    @error('modelo')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fecha de Matriculacion</label>
                    <input name="fecha_matriculacion" type="date" value="{{ old('fecha_matriculacion') }}"class="form-control" id="exampleFormControlInput1" placeholder="12345">
                    @error('fecha_matriculacion')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input name="user_id" type="number" value="{{ old('user_id') }}"class="form-control" id="exampleFormControlInput1" placeholder="500">
                    @error('user_id')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <select  class="js-example-basic-single" name="user_id_2">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
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