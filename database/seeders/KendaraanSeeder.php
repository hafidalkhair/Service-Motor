<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    public function run()
    {
        Kendaraan::create([
            'pelanggans_id' => 1,
            'no_plat' => 'B1234XYZ',
            'jenis_kendaraan' => 'Matic',
            'no_stnk' => 'STNK001',
            'tahun_pembuatan' => 2020,
            'warna' => 'Merah',
        ]);

        Kendaraan::create([
            'pelanggans_id' => 2,
            'no_plat' => 'B5678ABC',
            'jenis_kendaraan' => 'Manual',
            'no_stnk' => 'STNK002',
            'tahun_pembuatan' => 2019,
            'warna' => 'Hitam',
        ]);

        Kendaraan::create([
            'pelanggans_id' => 3,
            'no_plat' => 'B9876DEF',
            'jenis_kendaraan' => 'Matic',
            'no_stnk' => 'STNK003',
            'tahun_pembuatan' => 2018,
            'warna' => 'Putih',
        ]);

        Kendaraan::create([
            'pelanggans_id' => 4,
            'no_plat' => 'B1357GHI',
            'jenis_kendaraan' => 'Manual',
            'no_stnk' => 'STNK004',
            'tahun_pembuatan' => 2021,
            'warna' => 'Biru',
        ]);

        Kendaraan::create([
            'pelanggans_id' => 5,
            'no_plat' => 'B2468JKL',
            'jenis_kendaraan' => 'Matic',
            'no_stnk' => 'STNK005',
            'tahun_pembuatan' => 2022,
            'warna' => 'Kuning',
        ]);
    }
}
