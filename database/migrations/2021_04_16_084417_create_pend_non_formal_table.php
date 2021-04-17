<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendNonFormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pend_non_formal', function (Blueprint $table) {
            $table->id('id_pendNonFormal');
            $table->foreignId('id_tenagaKerja');
            $table->string('kursus');
            $table->string('nama_institusi');
            $table->string('periode');
            $table->string('lokasi');
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
        Schema::dropIfExists('pend_non_formal');
    }
}
