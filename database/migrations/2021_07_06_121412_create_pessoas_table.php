<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 250);
            $table->string('email', 250);
            $table->date('dataNasc');
            $table->string('cpf', 15);
            $table->string('formacao', 150);
            $table->string('statusform', 150);
            $table->string('nomeform', 200);
            $table->string('genero', 100);
            $table->date('dataEnt');
            $table->date('dataSai')->nullable();
            $table->unsignedBigInteger('id_end')->nullable();
            $table->foreign('id_end')->references('id')->on('enderecos');
            $table->unsignedBigInteger('id_tel');
            $table->foreign('id_tel')->references('id')->on('telefones');
            $table->unsignedBigInteger('id_func');
            $table->foreign('id_func')->references('id')->on('funcaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
