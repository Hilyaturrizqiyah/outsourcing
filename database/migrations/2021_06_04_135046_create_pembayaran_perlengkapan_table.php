<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPerlengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_perlengkapan', function (Blueprint $table) {
            $table->id('id_pembayaranPerlengkapan');
            $table->foreignId('id_outsourcing');
            $table->foreignId('id_kontrak');
            $table->string('nama_pembayaran');
            $table->integer('nominal')->nullable();
            $table->string('bukti_tf')->nullable();
            $table->dateTime('waktu_bayar')->nullable();
            $table->string('status_bayar');
            $table->timestamps();

            $table->foreign('id_outsourcing')->references('id_outsourcing')->on('outsourcing');
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
        Schema::dropIfExists('pembayaran_perlengkapan');
    }
}
