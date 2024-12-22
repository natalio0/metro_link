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
        Schema::create('agenda_kotas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('Nama_Penyelenggara');
            $table->string('Nama_Event');
            $table->string('kategori');
            $table->text('Deskripsi_Event');
            $table->date('Tanggal_Pelaksanaan');
            $table->enum('status', ['acc', 'pending'])->default('pending');
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
        Schema::dropIfExists('agenda_kotas');
    }
};
