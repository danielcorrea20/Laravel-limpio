<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CocheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generar un array con todos los id de la tabla 'users'
        $todos_id = User::pluck('id')->toArray();

        // Sobre este array, puedo coger datos aleatorios
        // randomElements($todos_id)

        /**
         * echo $faker->randomElements(['a', 'b', 'c', 'd', 'e']);
         *
         *   ['c'] --> esto es lo retornado por el metodo randomElements
         *             es un array con una unica posicion.
         *             para acceder a ese valor, necesito coger el elemento de la poscion 0
         * 
         */
        return [
            'marca' => $this->faker->name(),
            'modelo' => $this->faker->name(),
            'fecha_matriculacion' => now(),
            'user_id' => $this->faker->randomElements($todos_id)[0], // un numero del 0 al 9
            // 'user_id' => User::factory()
            // $this->faker->randomElements($todos_id);
        ];
    }
}
