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
        Schema::create('itens_inspecao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inspecao');
            $table->unsignedBigInteger('tarefa');

            $table->float('peso', 8, 2)->default(0);            
            $table->float('valor', 8, 2)->default(0);            
            $table->string('foto')->nullable();            
            $table->string('status', 4);            
            
            $table->foreign('inspecao')->references('id')->on('inspecoes');
            $table->foreign('tarefa')->references('id')->on('tarefas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_inspecao');
    }
};
