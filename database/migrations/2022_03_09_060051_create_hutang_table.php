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
        Schema::create('Hutang', function (Blueprint $table) {
            $table->id();
            $table->string('ID_WP');
            $table->date('Tanggal');
            $table->date('Tanggal_Jatuh_Tempo');
            $table->bigInteger('Jumlah');
            $table->string('Keterangan');
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
        Schema::dropIfExists('Hutang');
    }
};
