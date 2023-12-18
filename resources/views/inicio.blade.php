@extends('plantilla')
@section('titulo','Inicio')

@section('contenido')
    <h1>Página de inicio</h1>
    <p>Bienvenido/a al blog</p>
    @if(session()->has('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif
@endsection