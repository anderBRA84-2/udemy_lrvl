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



        schema::table('products',function(Blueprint $table){

        //criamos um usuario padrao para não apagramos nenhum registro na tabela produtos caso contrario teriamos um erro na aplicacao
        //se fosse a primeira migrate das tabelas nao era necessario

        DB::table('fornecedors')->insertGetId([
            'name' => 'SG',
            'site' => 'sg.com.br',
            'uf'   =>  'RJ'  ,
            'email'=>  'sg@email.com.br'

        ]);

            $table->unsignedBigInteger('fornecedor_id')->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        schema::table('products',function(Blueprint $table){
            $table->dropForeign('products_fornecedor_id')->references('id')->on('fornecedors');
            $table->dropColumn('fornecedor_id');
        });



    }
};
