<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota_kabupaten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_provinsi');
            $table->string('nama_kotaKabupaten');
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota_kabupaten');
    }
}
