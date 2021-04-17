<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaTenagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_tenaga', function (Blueprint $table) {
            $table->id('id_biayaTenaga');
            $table->foreignId('id_jasa');
            $table->string('nama_biayaTenaga');
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
        Schema::dropIfExists('biaya_tenaga');
    }
}
