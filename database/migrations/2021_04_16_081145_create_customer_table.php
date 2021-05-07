<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->foreignId('id_area')->nullable();
            $table->string('nama_customer');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('password');
            $table->string('foto_profil')->nullable();
            $table->timestamps();

            $table->foreign('id_area')->references('id_area')->on('area');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
