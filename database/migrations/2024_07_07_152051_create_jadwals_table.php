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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('hari_id');
            $table->unsignedBigInteger('jam_id');
            $table->timestamps();

            $table->foreign('dokter_id')->references('id')->on('dokters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hari_id')->references('id')->on('haris')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jam_id')->references('id')->on('jams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
