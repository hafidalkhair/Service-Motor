<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DaftarService;

class PembayaranFactory extends Factory
{
    public function definition()
    {
        return [
            'id_daftar_service' => DaftarService::inRandomOrder()->first()->id,
            'jumlah_biaya' => $this->faker->numberBetween(50000, 500000),
            'jenis_pembayaran' => $this->faker->randomElement(['Cash', 'Non Tunai']),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}

