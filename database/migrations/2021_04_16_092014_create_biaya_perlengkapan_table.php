<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaPerlengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_perlengkapan', function (Blueprint $table) {
            $table->id('id_biayaPerlengkapan');
            $table->foreignId('id_jasa');
            $table->string('nama_biayaPerlengkapan');
            $table->integer('biaya');
            $table->timestamps();

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
        Schema::dropIfExists('biaya_perlengkapan');
    }
}
