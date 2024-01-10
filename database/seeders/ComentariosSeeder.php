<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comentario;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts = Post::all();
        $posts->each(function($post) {
            Comentario::factory()->count(3)->create([
                'post_id' => $post->id
            ]);
        });
    }
}
