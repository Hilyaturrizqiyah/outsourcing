<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_komplain', function (Blueprint $table) {
            $table->id('id_detailKomplain');
            $table->foreignId('id_komplain');
            $table->foreignId('id_tenagaKerja');
            $table->string('alasan');
            $table->timestamps();

            $table->foreign('id_komplain')->references('id_komplain')->on('komplain');
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
        Schema::dropIfExists('detail_komplain');
    }
}
