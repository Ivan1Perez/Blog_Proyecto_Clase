<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Usuario;
use App\Models\Comentario;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('usuario')->orderBy('titulo')
            ->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return redirect()->route('inicio')->with('mensaje', 'Aquí va un formulario para crear');
        $usuarios = Usuario::get();
        return view('posts.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->usuario_id = Usuario::inRandomOrder()->first()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->login === $post->usuario->login || auth()->user()->rol === 'admin') {
            return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('posts.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if (auth()->user()->rol === 'admin') {
            $post = Post::findOrFail($id);
            $post->delete();
            $post->titulo = $request->get('titulo');
            $post->contenido = $request->get('contenido');
            $post->save();
        } else {
            return redirect()->route('posts.index')->with('error', 'No tienes permisos para realizar esta acción.');
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->login === $post->usuario->login || auth()->user()->rol === 'admin') {
            Comentario::where('post_id', $id)->delete();
            $post->delete();
        }
        return redirect()->route('posts.index');
    }

    /**
     * Simulación del método de inserción
     *
     *
     */
    public function nuevoPrueba()
    {
        $post = new Post();
        $randomNumber = mt_rand(1, 100);
        $post->titulo = "Título $randomNumber";
        $post->contenido = "Contenido $randomNumber";
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Simulación del método de editar
     *
     *
     */
    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);

        $post->titulo = "Título modificado";

        $post->save();

        return redirect()->route('posts.index');
    }
}
