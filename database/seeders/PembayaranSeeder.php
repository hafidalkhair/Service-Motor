<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\Service; // Import model Service

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        // Ambil data service pertama, atau buat data service baru jika perlu
        $service = Service::first(); // Mengambil service pertama, bisa juga menggunakan `Service::find(1);` jika id-nya sudah pasti
        
        // Pastikan service ada, jika tidak, buat data service baru
        if (!$service) {
            $service = Service::create([
                'nama_service' => 'Servis Ban', // Ganti dengan data yang sesuai
                'harga_service' => 100000,      // Ganti dengan harga yang sesuai
                'deskripsi' => 'Servis ban untuk kendaraan',
            ]);
        }

        // Menambahkan data pembayaran dengan service yang sudah diambil
        Pembayaran::create([
            'service_id' => $service->id,  // Menggunakan id dari service yang sudah ada
            'jumlah_biaya' => 352410,
            'jenis_pembayaran' => 'Non Tunai',
            'keterangan' => 'Quaerat sit et quis suscipit.',
        ]);
    }
}
