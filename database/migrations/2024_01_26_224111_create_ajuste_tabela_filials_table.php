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
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filiais', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('product_id');
            $table->double('Preco_venda', 8, 2)->default(0.1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();
            //foreign key (constraits)
            $table->Foreign('filial_id')->references('id')->on('filials');
            $table->Foreign('product_id')->references('id')->on('products');

        });

        //removendo colunas da tabela produtos
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn(['Preco_venda','estoque_minimo','estoque_maximo']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //removendo colunas da tabela produtos
        Schema::table('products', function (Blueprint $table) {
            $table->double('Preco_venda', 8, 2)->default(0.1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);

        });


        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filials');

    }
};
