<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPribadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pribadi', function (Blueprint $table) {
            $table->id('id_data_pribadi');
            $table->foreignId('id_tenagaKerja');
            $table->string('no_ktp');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('foto');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_rumah');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->integer('anak_ke');
            $table->string('nama_ayah_kandung');
            $table->string('nama_ibu_kandung');
            $table->string('status_menikah');
            $table->string('status_kepemilikan_rumah');
            $table->string('transportasi');
            $table->string('no_telp');
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
        Schema::dropIfExists('data_pribadi');
    }
}
