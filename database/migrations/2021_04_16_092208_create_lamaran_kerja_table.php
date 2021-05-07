<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaranKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran_kerja', function (Blueprint $table) {
            $table->id('id_lamaran');
            $table->foreignId('id_tenagaKerja');
            $table->foreignId('id_jasa');
            $table->date('waktu_diterima');
            $table->string('status_lamaran');
            $table->timestamps();

            $table->foreign('id_tenagaKerja')->references('id_tenagaKerja')->on('tenaga_kerja');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamaran_kerja');
    }
}
