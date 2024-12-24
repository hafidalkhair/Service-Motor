<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    use HasFactory;
    protected $fillable = [
        'kendaraans_id',  // Kolom untuk menyimpan id kendaraan
        'pelanggans_id',   // Kolom untuk menyimpan id pelanggan
        'keluhan',         // Kolom untuk keluhan servis
        'tanggal_servis',  // Kolom untuk tanggal servis
    ];
    // Relasi ke kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id');
    }

    // Relasi dengan Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }
}
