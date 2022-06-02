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
        Schema::create('Sumber_Dana', function (Blueprint $table) {
            $table->id();
            $table->string('ID_WP');
            $table->string('Jenis');
            $table->string('Inisial');
            $table->string('No_Rekening');
            $table->string('Nama_Bank');
            $table->string('Pemilik_Rekening');
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
        Schema::dropIfExists('Sumber_Dana');
    }
};
