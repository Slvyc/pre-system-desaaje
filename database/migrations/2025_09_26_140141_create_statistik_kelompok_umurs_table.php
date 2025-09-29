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
        Schema::create('statistik_kelompok_umur', function (Blueprint $table) {
            $table->id();
            $table->string('rentang_umur', '50')->unique();
            $table->bigInteger('jumlah_laki_laki');
            $table->bigInteger('jumlah_perempuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_kelompok_umur');
    }
};
