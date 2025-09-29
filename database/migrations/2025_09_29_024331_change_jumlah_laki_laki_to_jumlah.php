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
        Schema::table('statistik_kelompok_umur', function (Blueprint $table) {
            $table->renameColumn('jumlah_laki_laki', 'jumlah');
            $table->dropColumn('jumlah_perempuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statistik_kelompok_umur', function (Blueprint $table) {
            //
        });
    }
};
