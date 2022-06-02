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
        Schema::create('Pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Depan');
            $table->string('Nama_Belakang');
            $table->string('Email');
            $table->string('Password');
            $table->string('Tipe_Member');
            $table->dateTime('Membership_Start');
            $table->dateTime('Membership_Exp');
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
        Schema::dropIfExists('Pengguna');
    }
};
