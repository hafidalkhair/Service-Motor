<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id', 'no_plat', 'jenis_kendaraan', 'no_stnk', 'tahun_pembuatan', 'nama_pemilik', 'warna'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class); // Pastikan nama model 'Pelangan' sudah sesuai
    }
}