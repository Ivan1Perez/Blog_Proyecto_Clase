@extends('plantilla')
@section('titulo', 'Mostrar posts')

@section('contenido')

    <div class="mx-4">

        <h1 class="text-2xl">
            <u>{{ $post->titulo }}</u>
            &nbsp;
            <span class="inline-block">
                @if (auth()->check() && auth()->user()->login === $post->usuario->login)
                    <a href="{{ route('posts.edit', $post->id) }}" type="submit"
                        class="bg-green-600 text-white px-1.5 py-0.5 rounded">
                        Editar
                    </a>
                @endif
            </span>
            &nbsp;
            <span class="inline-block">
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if (auth()->check() && auth()->user()->login === $post->usuario->login)
                        <button type="submit" class="bg-red-600 text-white px-1.5 py-0.5 rounded">
                            Borrar
                        </button>
                    @endif
                </form>
            </span>
        </h1>
        <p class="my-4">{{ $post->contenido }}</p>
        <div class="flex justify-between">
            <p class="text-[#5e5e5e]"><i>Escrito por <b class="text-[#343434]">{{ $post->usuario->login }}</b></i></p>
            <p class="text-right">
                <i>Fecha de creación:
                    <b>{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</b>
                </i>
            </p>
        </div>

        <div class="my-2">
            <h3 class="text-[1.5rem]">Comentarios</h3>
            <div class="border-[1px] rounded">
                @forelse ($post->comentarios as $comentario)
                    <p class="p-2">{{ $comentario->contenido }}</p>
                    <p class="bg-[#efefef] border-y-[1px] p-2"><b><i>{{ $comentario->usuario->login }}</i></b></p>
                @empty
                    <p>No hay comentarios</p>
                @endforelse
            </div>
        </div>
        <hr>

    </div>

@endsection
