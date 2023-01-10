<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checklist');
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('setor');
            $table->unsignedBigInteger('lider');

            $table->dateTime('data_inspecao');
            $table->dateTime('data_integracao');
            $table->string('status', 4);            

            $table->foreign('checklist')->references('id')->on('checklists');
            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('setor')->references('id')->on('setores');
            $table->foreign('lider')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspecoes');
    }
};
