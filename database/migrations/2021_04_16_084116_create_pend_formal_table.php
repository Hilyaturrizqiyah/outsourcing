<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendFormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pend_formal', function (Blueprint $table) {
            $table->id('id_pendFormal');
            $table->foreignId('id_tenagaKerja');
            $table->string('pendidikan');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('periode_masuk');
            $table->string('periode_keluar');
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
        Schema::dropIfExists('pend_formal');
    }
}
