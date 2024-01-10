<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comentario;
use App\Models\Usuario;

class ComentarioFactory extends Factory
{

    protected $model = Comentario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contenido' => $this->faker->text,
            'usuario_id' => Usuario::inRandomOrder()->first()
        ];
    }
}
