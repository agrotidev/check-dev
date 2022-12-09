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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checklist');
            $table->unsignedBigInteger('categoria_tarefa');

            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->float('valor', 8, 2)->default(0);  
            $table->boolean('ativo')->default(true);

            $table->foreign('checklist')->references('id')->on('checklists');
            $table->foreign('categoria_tarefa')->references('id')->on('categoria_tarefas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
