@extends('plantilla')
@section('titulo', 'Login')

@section('contenido')
    <div class="w-[500px] m-auto">
        <h1 class="text-[1.5rem]">Login</h1>
        @if (!empty($error))
            <div class="text-danger">
                {{ $error }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="login" class="my-2">Login:</label>
            <input type="text" class="form-control" name="login" id="login" />

            <label for="password" class="my-2">Password:</label>
            <input type="password" class="form-control" name="password" id="password" />

            <input type="submit" name="enviar" value="Enviar" class="rounded bg-blue-500 text-white p-2 my-4">
        </form>
    </div>
@endsection
