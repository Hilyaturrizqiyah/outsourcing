<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_outsourcing');
            $table->foreignId('id_kontrak');
            $table->string('nama_pembayaran');
            $table->integer('nominal');
            $table->string('bukti_tf');
            $table->string('status_bayar');
            $table->dateTime('waktu');
            $table->integer('bulan_ke');
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
        Schema::dropIfExists('pembayaran');
    }
}
