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
            $table->foreignId('id_area');
            $table->foreignId('id_admin');
            $table->string('nama_outsourcing');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('nama_pemilikRekening');
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->string('email');
            $table->string('password');
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
