<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagaKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_kerja', function (Blueprint $table) {
            $table->id('id_tenagaKerja');
            $table->foreignId('id_area')->nullable();
            $table->foreignId('id_jasa')->nullable();
            $table->foreignId('id_kontrak')->nullable();
            $table->string('nama_tenagaKerja');
            $table->string('no_ktp');
            $table->string('email');
            $table->string('password');
            $table->string('status_tenagaKerja');
            $table->string('foto_profil')->nullable();
            $table->timestamps();

            $table->foreign('id_area')->references('id_area')->on('area');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa');
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
        Schema::dropIfExists('tenaga_kerja');
    }
}
