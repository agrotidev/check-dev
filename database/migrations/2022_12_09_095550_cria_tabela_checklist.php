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
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grupo_checklist');
            $table->unsignedBigInteger('setor');
            $table->unsignedBigInteger('tipo_tarefas');
            $table->unsignedBigInteger('user');


            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->boolean('ativo')->default(true);

            $table->foreign('grupo_checklist')->references('id')->on('grupo_checklists');
            $table->foreign('setor')->references('id')->on('setores');
            $table->foreign('tipo_tarefas')->references('id')->on('tipo_tarefas');
            $table->foreign('user')->references('id')->on('users');
            
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
        Schema::dropIfExists('checklists');
    }
};
