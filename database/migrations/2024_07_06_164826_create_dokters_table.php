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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_sip');
            $table->string('no_hp');
            $table->string('alamat');
            $table->unsignedBigInteger('spesialis_id');
            $table->date('tanggal_lahir');
            $table->string('profile_url');
            $table->timestamps();

            $table->foreign('spesialis_id')->references('id')->on('spesialis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
