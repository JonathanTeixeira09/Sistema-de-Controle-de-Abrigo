<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 250);
            $table->string('descricao', 300);
            $table->float('quantidade', 15, 2)->nullable();//acredito que não será necessário
            $table->float('qtdMin', 15, 2);
            $table->string('lote', 200)->nullable();
            $table->date('vencimento');
            $table->unsignedBigInteger('id_uni')->nullable();
            $table->foreign('id_uni')->references('id')->on('uni_meds');
            $table->unsignedBigInteger('id_cat')->nullable();
            $table->foreign('id_cat')->references('id')->on('categorias'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
