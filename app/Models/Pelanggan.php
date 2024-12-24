<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 
        'no_hp', 
        'alamat', 
        'pekerjaan'
    ];

    // Relasi dengan kendaraan
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'pelanggan_id');
    }

    // Relasi dengan service
    public function services()
    {
        return $this->hasMany(Service::class, 'pelanggan_id');
    }
}


