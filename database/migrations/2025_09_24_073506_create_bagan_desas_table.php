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
        Schema::create('bagan_desa', function (Blueprint $table) {
            $table->id();
            $table->string('struktur_organisasi_pemerintahan_desa')->nullable();
            $table->string('struktur_organisasi_badan_permusyawaratan_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bagan_desa');
    }
};
