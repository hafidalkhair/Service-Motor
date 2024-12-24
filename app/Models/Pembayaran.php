<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'services_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan',
    ];

    // Relasi dengan DaftarService
    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'services_id');
    }
}
