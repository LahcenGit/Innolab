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
        Schema::create('detaildocuments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->bigInteger('id_logiciel');
            $table->string('rubrique');
            $table->float('value');
            $table->string('unite');
            $table->string('norme');
            $table->integer('flag');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('detaildocuments');
    }
};
