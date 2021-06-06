<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak_jasa', function (Blueprint $table) {
            $table->id('id_kontrak');
            $table->foreignId('id_customer');
            $table->foreignId('id_jasa');
            $table->foreignId('id_outsourcing');
            $table->date('tgl_mulai_kontrak');
            $table->string('lama_kontrak');
            $table->integer('jumlah_tenagaKerja');
            $table->integer('jumlah_biayaTenagaKerja')->nullable();
            $table->integer('jumlah_biayaPerlengkapan')->nullable();
            $table->string('status_kontrak');
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa');
            $table->foreign('id_outsourcing')->references('id_outsourcing')->on('outsourcing');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontrak_jasa');
    }
}
