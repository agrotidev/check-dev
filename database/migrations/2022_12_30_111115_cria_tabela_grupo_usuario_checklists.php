<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('grupo_checklist_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grupo_checklist');
            $table->unsignedBigInteger('user');

            $table->foreign('grupo_checklist')->references('id')->on('grupo_checklists');
            $table->foreign('user')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_usuario_checklists');
    }
};
