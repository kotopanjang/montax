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
        Schema::create('bukti_potong', function (Blueprint $table) {
            $table->id();
            $table->string('ID_WP');
            $table->string('Jenis_Pajak	NPWP_Pemotong');
            $table->string('Nama_Pemotong');
            $table->string('Nomor_Bukti_Pemotongan');
            $table->date('Tanggal_Bukti_Pemotongan');
            $table->bigInteger('Jumlah');
            $table->timestamps();
            $table->integer('show_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_potong');
    }
};
