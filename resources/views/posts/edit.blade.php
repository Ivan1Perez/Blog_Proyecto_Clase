@extends('plantilla')
@section('titulo', 'Editar')

@section('contenido')
    <h1>Editar post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="w-[500px] m-auto space-y-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $post->titulo }}">
            @if ($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" placeholder="Contenido..." class="placeholder:italic placeholder:text-black w-[500px] rounded border-2 p-2">
                {{ $post->contenido }}
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
