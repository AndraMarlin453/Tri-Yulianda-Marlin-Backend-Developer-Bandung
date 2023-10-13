<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalkulator', function (Blueprint $table) {
            $table->integer('id');
            $table->unique('id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('foto');
            $table->string('jenisSampah');
            $table->integer('jumlahSampah');
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kalkulator');
    }
};
