<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->integer('harga_tiket')->unsigned()->change();
        });
    }

    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->decimal('harga_tiket', 10, 2)->unsigned()->change();
        });
    }
};
