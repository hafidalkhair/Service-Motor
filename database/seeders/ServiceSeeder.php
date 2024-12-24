<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'daftar_services_id' => 1, // ID dari daftar_services yang sudah ada
            'keluhan' => 'Ban bocor',
            'estimasi_servis' => '2 jam',
            'nama_mekanik' => 'Mekanik A',
            'sparepart_pengganti' => 'Ban Baru',
        ]);

        Service::create([
            'daftar_services_id' => 2, // ID dari daftar_services yang sudah ada
            'keluhan' => 'Mesin tidak menyala',
            'estimasi_servis' => '3 jam',
            'nama_mekanik' => 'Mekanik B',
            'sparepart_pengganti' => 'Busi',
        ]);

        // Tambahkan 3 data lagi sesuai kebutuhan
    }
}
