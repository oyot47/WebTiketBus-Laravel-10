<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_asal_id');
            $table->unsignedBigInteger('kota_tujuan_id');
            $table->unsignedBigInteger('terminal_asal_id');
            $table->unsignedBigInteger('terminal_tujuan_id');
            $table->date('tanggal_keberangkatan');
            $table->date('tanggal_sampai');
            $table->time('jam_keberangkatan');
            $table->time('jam_sampai');
            $table->string('destinasi_waktu');
            $table->unsignedBigInteger('bus_id');
            $table->integer('jumlah_tiket_tersedia')->nullable(); // Tambahkan kolom jumlah tiket
            $table->timestamps();

            $table->foreign('kota_asal_id')->references('id')->on('kota');
            $table->foreign('kota_tujuan_id')->references('id')->on('kota');
            $table->foreign('terminal_asal_id')->references('id')->on('terminal');
            $table->foreign('terminal_tujuan_id')->references('id')->on('terminal');
            $table->foreign('bus_id')->references('id')->on('bus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
