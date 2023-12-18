@extends('plantilla')
@section('titulo','Inicio posts')

@section('contenido')
    <h1>Listado de posts</h1>
    @forelse ($blogs as $blog)
        <p>Ver la ficha<a href="{{route('posts.show',$blog)}}"> numero {{$blog}}</a></p>
    @empty
        <p>No hay blogs disponibles</p>
    @endforelse
@endsection