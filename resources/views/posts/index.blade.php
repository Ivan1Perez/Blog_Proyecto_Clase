@extends('plantilla')
@section('titulo','Inicio posts')

@section('contenido')
    <h1>Listado de posts</h1>
    @forelse ($posts as $post)
        <p>{{$post->titulo}}</p>
        <a href="{{route('posts.show', $post->titulo)}}">Ver post</a>
    @empty
        <p>No hay blogs disponibles</p>
    @endforelse
@endsection
