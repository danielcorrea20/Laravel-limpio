@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir ficheros</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="{{ route('file_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="fichero">
                        <button class="btn btn-primary" type="submit">Subir fichero</button>
                        <a href="{{ route('profesor_index') }}" class="btn btn-secondary">Atras</a>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ficheros disponibles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example1" class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Usuario</th>
                            <th scope="col"></th>
                    </thead>
                    <tbody>
                   @foreach ($file as $f)
                   
                   <tr>
                    <th scope="row">{{ $f->id }}</th>
                    <th><img style="width: 200px;" src="{{ asset('storage/' . $f->ruta) }}"></th>
                    <th scope="row">{{ $f->user_id }}</th>
                    <th scope="col">
                        <form method="POST" action="{{ route('file_destroy', $f->id) }}" id="formularioEliminar">
                            @csrf 
                            @method('delete')
                            <input class ="btn btn-danger"type="submit" value="Eliminar">                                        
                        </form>
                    </th>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
