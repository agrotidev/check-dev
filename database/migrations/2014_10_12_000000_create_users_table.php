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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('setor');
            $table->unsignedBigInteger('modulo');

            $table->integer('code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('active')->default(false);
            $table->boolean('ismanager')->default(false);
            $table->boolean('islider')->default(false);
            $table->boolean('mobile')->default(false);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(bcrypt('teste123'));
            $table->string('password_mobile')->default(md5('teste123'));
            $table->rememberToken();

            $table->foreign('setor')->references('id')->on('setores');
            $table->foreign('modulo')->references('id')->on('setores');
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
        Schema::dropIfExists('users');
    }
};
