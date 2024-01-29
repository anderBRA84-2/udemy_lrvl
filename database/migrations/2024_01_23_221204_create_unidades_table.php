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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade');
            $table->string('descricao');
            $table->timestamps();
        });

        //add o relacionamento com a tabela products
        Schema::table('products', function (Blueprint $table ){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        //add o relacionamento com a tabela product_details
        Schema::table('product_details', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remove o relacionamento com a tabela products
        Schema::table('products', function (Blueprint $table ){
            //remover a fk
            $table->dropForeign('products_unidade_id_foreign');//[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //remove o relacionamento com a tabela product_details
        Schema::table('product_details', function (Blueprint $table ){
            //remover a fk
            $table->dropForeign('product_details_unidade_id_foreign');//[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        Schema::dropIfExists('unidades');
    }
};
