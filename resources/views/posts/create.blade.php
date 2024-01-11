@extends('plantilla')
@section('titulo', 'Crear')

@section('contenido')
    <h1 class="text-center">Nuevo Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" class="w-[500px] m-auto space-y-4">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}">
            @if ($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" placeholder="Contenido..." class="placeholder:italic placeholder:text-black">
                {{ old('contenido') }}
            </textarea>
            @if ($errors->has('contenido'))
                <div class="text-danger">
                    {{ $errors->first('contenido') }}
                </div>
            @endif
        </div>
        <input type="submit" name="enviar" value="Enviar" class="rounded bg-blue-500 text-white p-2">
    </form>
@endsection
