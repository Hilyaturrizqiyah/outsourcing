<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_kerja', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->foreignId('id_tenagaKerja');
            $table->string('nama_perusahaan');
            $table->string('periode');
            $table->string('posisi');
            $table->integer('gaji');
            $table->string('alasan_berhenti');
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
        Schema::dropIfExists('pengalaman_kerja');
    }
}
