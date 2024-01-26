@extends('plantilla')
@section('titulo', 'Inicio')

@section('contenido')
    <div class="m-4">

        <h1 class="text-2xl">Página de inicio</h1>
        <p>Bienvenido/a al blog
            @if (session()->has('mensaje'))
                <span><b><i>{{ session('mensaje') }}</i></b></span>
            @endif
        </p>
    </div>
@endsection
