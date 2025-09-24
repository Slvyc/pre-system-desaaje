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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->enum('kategori_pengaduan', ['Umum', 'Sosial', 'Keamanan', 'Kesehatan', 'Kebersihan', 'Permintaan']);
            $table->text('isi_pengaduan');
            $table->string('lampiran')->nullable();
            $table->enum('status_pengaduan', ['Belum Diproses', 'Sedang Diproses', 'Selesai'])->default('Belum Diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
