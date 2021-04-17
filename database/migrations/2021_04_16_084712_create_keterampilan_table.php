<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterampilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterampilan', function (Blueprint $table) {
            $table->id('id_keterampilan');
            $table->foreignId('id_tenagaKerja');
            $table->string('nama_keterampilan');
            $table->string('kemampuan');
            $table->timestamps();

            $table->foreign('id_tenagaKerja')->references('id_tenagaKerja')->on('tenaga_kerja');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterampilan');
    }
}
