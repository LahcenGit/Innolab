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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('id_logiciel');
            $table->string('designation');
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_fixe')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse');
            $table->string('code');
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->tinyInteger('flag_etat')->nullable();
            $table->string('px')->nullable();
            $table->string('py')->nullable();
            $table->string('flag')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('laboratories');
    }
};
