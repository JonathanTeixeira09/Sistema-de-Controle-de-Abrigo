<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbrigadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abrigados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 250);
            $table->string('nome_mae', 250)->nullable();
            $table->string('nome_pai', 250)->nullable();
            $table->string('nome_resp', 250)->nullable();
            $table->date('dataEnt');
            $table->string('genero', 100);
            $table->date('dataSai')->nullable();
            $table->string('cpf', 15)->nullable();
            $table->date('dataNasc');
            $table->string('obs', 350)->nullable();
            $table->unsignedBigInteger('idLoc');
            $table->foreign('idLoc')->references('id')->on('locals');
            $table->unsignedBigInteger('id_tel')->nullable();
            $table->foreign('id_tel')->references('id')->on('telefones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abrigados');
    }
}
