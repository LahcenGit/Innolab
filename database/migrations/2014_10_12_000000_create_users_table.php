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
            $table->id();
            $table->bigInteger('id_logiciel');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('date_de_naissance');
            $table->tinyInteger('etat')->nullable();
            $table->string('type')->nullable();
            $table->char('sexe');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
