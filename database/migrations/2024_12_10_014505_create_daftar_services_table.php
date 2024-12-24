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
        Schema::create('daftar_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraans_id')->constrained('kendaraans')->onDelete('cascade');
            $table->foreignId('pelanggans_id')->constrained('pelanggans')->onDelete('cascade');
            $table->text('keluhan');
            $table->date('tanggal_servis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_services');
    }
};
