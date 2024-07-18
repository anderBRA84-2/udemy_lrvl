<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidade;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unidade>
 */
class UnidadeFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Unidade::class;

    public function definition(): array
    {
        return [
            //
            'unidade' => $this->faker->randomElement(['kg', 'GR', 'M', 'CM']),
            'descricao' => $this->faker->sentence,
        ];
    }
}
