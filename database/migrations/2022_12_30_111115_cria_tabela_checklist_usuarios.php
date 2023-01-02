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
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('grupo');

            $table->foreign('checklist')->references('id')->on('checklists');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('grupo')->references('id')->on('checklist_grupos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_usuarios');
    }
};
