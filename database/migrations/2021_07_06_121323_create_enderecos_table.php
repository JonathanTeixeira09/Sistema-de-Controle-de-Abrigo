<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipoLog', 100)->nullable();
            $table->string('nomeLog', 250)->nullable();
            $table->string('nrEnd', 100)->nullable();
            $table->string('complEnd', 100)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('obsEnd', 100)->nullable();
            $table->unsignedBigInteger('id_bai')->nullable();
            $table->foreign('id_bai')->references('id')->on('bairros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
