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
        Schema::create('aparat_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aparat');
            $table->string('jabatan_aparat');
            $table->string('foto_aparat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aparat_desas');
    }
};
