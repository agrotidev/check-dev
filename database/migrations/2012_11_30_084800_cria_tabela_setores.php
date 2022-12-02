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
        Schema::table('setores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('departamento');

            $table->integer('cod_setor')->unique();
            $table->string('nome');
            $table->boolean('ativo')->default(true);

            $table->foreign('departamento')->references('id')->on('departamentos');
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
        Schema::table('setores', function (Blueprint $table) {
            //
        });
    }
};
