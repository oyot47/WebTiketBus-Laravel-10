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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terminal_asal_id');
            $table->unsignedBigInteger('terminal_tujuan_id');
            $table->string('waktu_destinasi');
            $table->timestamps();

            $table->foreign('terminal_asal_id')->references('id')->on('terminal');
            $table->foreign('terminal_tujuan_id')->references('id')->on('terminal');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
