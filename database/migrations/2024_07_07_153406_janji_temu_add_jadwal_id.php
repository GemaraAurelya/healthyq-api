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
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->unsignedBigInteger('jadwal_id');

            $table->foreign('jadwal_id')->references('id')->on('jadwals')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->dropColumn('jadwal_id');
        });
    }
};
