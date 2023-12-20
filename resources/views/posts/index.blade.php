@extends('plantilla')
@section('titulo', 'Inicio posts')

@section('contenido')
    <div class="m-4">
        <h1 class="text-2xl mb-4">Listado de posts</h1>
        <ul class="space-y-4">
            @forelse ($posts as $post)
                <li class="flex gap-2 items-center">
                    <p><b>{{ $post->titulo }}</b></p>
                    <a href="{{ route('posts.show', $post->titulo) }}" class="bg-[#0d6efd] text-white px-1.5 py-0.5 rounded">Ver post</a>
                </li>
            @empty
                <li>
                    <p>No hay blogs disponibles</p>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
