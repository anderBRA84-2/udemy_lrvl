<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        //add a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            
           });

           // atribuindo motivo_contato a nova coluna motivo_contato_id
           DB::statement('update site_contatos set motivo_contato_id = motivo_contato');


           //criação da fk remocao da coluna motivo contato
           Schema::table('site_contatos', function (Blueprint $table) {
            
            $table->dropColumn('motivo_contato');
           });

          
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            //criação da fk remocao da coluna motivo contato
            Schema::table('site_contatos', function (Blueprint $table) {
            
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
            });

            //atribuindo motivo_contato_id a nova coluna motivo_contato
            DB::statement('update site_contatos set motivo_contato = motivo_contato_id');

            //removendo a coluna motivo_contato_id
            Schema::table('site_contatos', function (Blueprint $table) {
            
                $table->dropColunm('motivo_contato_id');
                
                });

    }
};
