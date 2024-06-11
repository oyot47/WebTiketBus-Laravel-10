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
        Schema::table('bus', function (Blueprint $table) {
            //
               
                $table->string('format_kursi')->after('jumlah_kursi'); // Menambah kolom format kursi
                
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bus', function (Blueprint $table) {
            //
        });
    }
};
