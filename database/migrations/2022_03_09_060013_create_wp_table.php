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
        Schema::create('WP', function (Blueprint $table) {
            $table->id();
            $table->string('ID_Pengguna');
            $table->string('Nama_Depan');
            $table->string('Nama_Tengah');
            $table->string('Nama_Belakang');
            $table->string('Email');
            $table->string('Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WP');
    }
};
