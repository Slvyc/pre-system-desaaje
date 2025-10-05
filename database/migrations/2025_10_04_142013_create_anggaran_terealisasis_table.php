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
        Schema::create('anggaran_terealisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uraian_id')->constrained('uraian')->cascadeOnDelete();
            $table->year('tahun');
            $table->decimal('anggaran', 20, 2)->default(0);
            $table->decimal('realisasi', 20, 2)->default(0);
            $table->decimal('lebih_kurang', 20, 2)->storedAs('anggaran - realisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran_terealisasi');
    }
};
