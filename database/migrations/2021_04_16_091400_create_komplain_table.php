<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplain', function (Blueprint $table) {
            $table->id('id_komplain');
            $table->foreignId('id_customer');
            $table->foreignId('id_kontrak');
            $table->string('alasan');
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->foreign('id_kontrak')->references('id_kontrak')->on('kontrak_jasa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komplain');
    }
}
