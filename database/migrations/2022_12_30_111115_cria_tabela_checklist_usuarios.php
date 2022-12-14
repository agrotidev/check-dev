<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('checklist_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checklist');
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('grupo');

            $table->foreign('checklist')->references('id')->on('checklists');
            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('grupo')->references('id')->on('grupos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_usuarios');
    }
};
