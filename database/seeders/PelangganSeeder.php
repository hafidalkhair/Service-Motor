<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        Pelanggan::create([
            'nama_lengkap' => 'John Doe',
            'no_hp' => '081234567890',
            'alamat' => 'Jalan Merdeka No. 1, Jakarta',
            'pekerjaan' => 'Developer',
        ]);

        Pelanggan::create([
            'nama_lengkap' => 'Jane Doe',
            'no_hp' => '081234567891',
            'alamat' => 'Jalan Merdeka No. 2, Jakarta',
            'pekerjaan' => 'Designer',
        ]);

        Pelanggan::create([
            'nama_lengkap' => 'Andi Setiawan',
            'no_hp' => '081234567892',
            'alamat' => 'Jalan Raya No. 3, Surabaya',
            'pekerjaan' => 'Manager',
        ]);

        Pelanggan::create([
            'nama_lengkap' => 'Rina Salma',
            'no_hp' => '081234567893',
            'alamat' => 'Jalan Kencana No. 4, Bali',
            'pekerjaan' => 'Entrepreneur',
        ]);

        Pelanggan::create([
            'nama_lengkap' => 'Budi Hartono',
            'no_hp' => '081234567894',
            'alamat' => 'Jalan Pahlawan No. 5, Bandung',
            'pekerjaan' => 'Teacher',
        ]);
    }
}
