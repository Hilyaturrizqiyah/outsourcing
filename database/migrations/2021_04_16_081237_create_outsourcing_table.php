<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsourcingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outsourcing', function (Blueprint $table) {
            $table->id('id_outsourcing');
            $table->foreignId('id_area')->nullable();
            $table->foreignId('id_admin')->nullable();
            $table->string('nama_outsourcing');
            $table->longText('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('nama_pemilikRekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('scan_siup')->nullable();
            $table->string('scan_tdp')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->string('no_siup')->nullable();
            $table->string('no_tdp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('status_outsourcing');
            $table->timestamps();

            $table->foreign('id_area')->references('id_area')->on('area');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outsourcing');
    }
}
