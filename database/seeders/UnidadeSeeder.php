<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $unidades = [
            ['unidade' => 'kg', 'descricao' => 'Kilogram'],
            ['unidade' => 'GR', 'descricao' => 'Gram'],
            ['unidade' => 'M', 'descricao' => 'Meter'],
            ['unidade' => 'CM', 'descricao' => 'Centimeter'],
        ];

        foreach ($unidades as $unidade) {
            Unidade::create($unidade);
        }
    }
}
