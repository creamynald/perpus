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
        Schema::create('pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pustaka');
            $table->string('judul_pustaka');
            $table->integer('kategori_pustaka_id');
            $table->integer('penerbit_id');
            $table->integer('penulis_id');
            $table->string('tahun');
            $table->string('gambar_pustaka')->nullable();
            $table->integer('halaman');
            $table->integer('stok');
            $table->string('rak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pustakas');
    }
};
