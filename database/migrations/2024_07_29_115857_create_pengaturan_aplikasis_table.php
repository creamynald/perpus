<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaturan_aplikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi')->default('PERPUSTAKAAN DIGITAL SD NEGERI 40 BENGKALIS');
            $table->string('nama_pimpinan')->default('ADELLIA FITRI');
            $table->string('alamat')->default('JL. AWANG MAHMUDA');
            $table->string('email')->default('SDN40BENGKALIS@GMAIL.COM');
            $table->string('no_telp')->default('0812-3456-7890');
            $table->string('website')->default('https://sdn40bengkalis.sch.id');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_aplikasis');
    }
};
