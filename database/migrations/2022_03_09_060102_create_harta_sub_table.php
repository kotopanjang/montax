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
        Schema::create('Harta_Sub', function (Blueprint $table) {
            $table->id();
            $table->string('ID_WP');
            $table->string('Jenis');
            $table->string('Deskripsi');
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
        Schema::dropIfExists('Harta_Sub');
    }
};
