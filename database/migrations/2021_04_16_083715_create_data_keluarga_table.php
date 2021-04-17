<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->id('id_data_keluarga');
            $table->foreignId('id_tenagaKerja');
            $table->string('nama_keluarga');
            $table->string('status_keluarga');
            $table->string('pekerjaan');
            $table->string('ttl');
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
        Schema::dropIfExists('data_keluarga');
    }
}
