<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;


class UsuarioFactory extends Factory
{

    protected $model = Usuario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $word = $this->faker->unique()->word;

        return [
            'login' => $word,
            'password' => bcrypt($word)
        ];
    }
}
