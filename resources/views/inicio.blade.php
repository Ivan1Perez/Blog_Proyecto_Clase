@extends('plantilla')
@section('titulo', 'Inicio')

@section('contenido')
    <div class="m-4">

        <h1 class="text-2xl">Página de inicio</h1>
        <p>Bienvenido/a al blog</p>
        @if (session()->has('mensaje'))
            <p>{{ session('mensaje') }}</p>
        @endif

    </div>
@endsection
