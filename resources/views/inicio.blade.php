@extends('plantilla')
@section('titulo', 'Inicio')

@section('contenido')
    <div class="m-4">
        <h1 class="text-2xl">Página de inicio</h1>
        <p>Bienvenido/a al blog</p>
        @if (session()->has('mensaje'))
            <p>{{ session('mensaje') }}</p>
        @endif

        <form action="{{route('nuevoPrueba')}}" method="">
            @csrf
            <button class="bg-[#0d6efd] text-white px-1.5 py-0.5 rounded my-4 block w-fit">Crear post</button>
        </form>
    </div>
@endsection
