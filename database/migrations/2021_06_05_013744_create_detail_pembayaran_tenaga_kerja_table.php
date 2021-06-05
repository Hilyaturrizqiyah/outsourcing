<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembayaranTenagaKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembayaran_tenaga_kerja', function (Blueprint $table) {
            $table->id('id_detailPembayaranPerlengkapan');
            $table->foreignId('id_pembayaranPerlengkapan');
            $table->foreignId('id_biayaPerlengkapan');
            $table->timestamps();

            $table->foreign('id_pembayaranPerlengkapan')->references('id_pembayaranPerlengkapan')->on('pembayaran_perlengkapan');
            $table->foreign('id_biayaPerlengkapan')->references('id_biayaPerlengkapan')->on('biaya_perlengkapan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembayaran_tenaga_kerja');
    }
}
