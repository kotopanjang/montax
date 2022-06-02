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
        Schema::create('Pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('ID_WP');
            $table->string('Nomor_Perkiraan');
            $table->string('Sub_Nomor_Perkiraan');
            $table->date('Tanggal');
            $table->bigInteger('Jumlah');
            $table->string('Keterangan');
            $table->string('Masuk_Ke');
            $table->integer('Show_Status');
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
        Schema::dropIfExists('Pengeluaran');
    }
};
