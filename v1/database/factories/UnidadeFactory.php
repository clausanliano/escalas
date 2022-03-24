<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unidade>
 */
class UnidadeFactory extends Factory
{
    public function definition()
    {
        {
            return [
                'nome' => $this->faker->company(),
                'sigla' => $this->faker->companySuffix(),
                'empresa_id' => random_int(1,10),
            ];
        }
    }
}
