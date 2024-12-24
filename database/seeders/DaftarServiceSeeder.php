<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DaftarService;

class DaftarServiceSeeder extends Seeder
{
    public function run()
    {
        DaftarService::create([
            'kendaraans_id' => 1,
            'pelanggans_id' => 1,
            'keluhan' => 'Ban bocor',
            'tanggal_servis' => '2024-12-10',
        ]);

        DaftarService::create([
            'kendaraans_id' => 2,
            'pelanggans_id' => 2,
            'keluhan' => 'Mesin berisik',
            'tanggal_servis' => '2024-12-11',
        ]);

        DaftarService::create([
            'kendaraans_id' => 3,
            'pelanggans_id' => 3,
            'keluhan' => 'Lampu depan mati',
            'tanggal_servis' => '2024-12-12',
        ]);

        DaftarService::create([
            'kendaraans_id' => 4,
            'pelanggans_id' => 4,
            'keluhan' => 'Ganti oli',
            'tanggal_servis' => '2024-12-13',
        ]);

        DaftarService::create([
            'kendaraans_id' => 5,
            'pelanggans_id' => 5,
            'keluhan' => 'AC tidak dingin',
            'tanggal_servis' => '2024-12-14',
        ]);
    }
}
