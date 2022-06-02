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
        Schema::create('Sub_Kategori', function (Blueprint $table) {
            $table->string('ID_Kategori');
            $table->string('ID_Sub_Kategori');
            $table->string('Nama');
            $table->string('Created_by');
            $table->string('Show_Status');
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
        Schema::dropIfExists('Sub_Kategori');
    }
};
