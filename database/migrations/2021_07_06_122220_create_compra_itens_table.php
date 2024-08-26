<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_itens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('valorUni', 15, 2);
            $table->float('quantidade', 15, 2);
            $table->float('valorTotal', 15, 2);
            $table->unsignedBigInteger('id_compra');
            $table->foreign('id_compra')->references('id')->on('compras');
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_itens');
    }
}
