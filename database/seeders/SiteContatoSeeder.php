<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SiteContato::factory(10)->create();

       /** $contato = new SiteContato;
        * $contato->name = 'Admin';
       * $contato->telefone = '(21)99999-9999';
       * $contato->email = 'admin@email.com';
        *$contato->motivo_contato = 1;
        * $contato->mensagem = 'Seeder laravel funcionando';
       * $contato->save(); */ 
   
    }
}
