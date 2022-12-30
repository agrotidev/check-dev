<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('grupo_usuario_checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grupo_checklist');
            $table->unsignedBigInteger('user');

            $table->foreign('grupo_checklist')->references('id')->on('grupo_checklists');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_usuario_checklists');
    }
};
