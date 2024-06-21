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
        Schema::create('kategori_pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori_pustaka');
            $table->string('nama_kategori_pustaka');
            $table->string('gambar_kategori_pustaka')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_pustakas');
    }
};
