@extends('plantilla')
@section('titulo','Mostrar posts')

@section('contenido')
    <div class="mx-4">

        <h1 class="text-2xl">{{$post->titulo}}</h1>
        <p class="my-4">{{$post->contenido}}</p>
        <p class="text-right"><i>Fecha de creación: <b>{{$post->created_at}}</b></i></p>

    </div>
@endsection