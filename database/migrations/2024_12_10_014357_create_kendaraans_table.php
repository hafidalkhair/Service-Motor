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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
            $table->string('no_plat'); // No Plat Kendaraan
            $table->enum('jenis_kendaraan', ['Matic', 'Manual Transimisi']); // Jenis Kendaraan dengan radio button
            $table->string('no_stnk'); // No STNK
            $table->integer('tahun_pembuatan'); // Tahun Pembuatan Kendaraan
            $table->string('warna'); // Warna Kendaraan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
