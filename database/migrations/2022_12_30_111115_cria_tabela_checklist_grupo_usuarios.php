<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('checklist_grupo_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checklist_grupo');
            $table->unsignedBigInteger('user');

            $table->foreign('checklist_grupo')->references('id')->on('checklist_grupos');
            $table->foreign('user')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_grupo_usuarios');
    }
};
