<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan;
use App\Models\Kendaraan;

class DaftarServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'id_pelanggan' => Pelanggan::inRandomOrder()->first()->id,
            'no_plat' => Kendaraan::inRandomOrder()->first()->no_plat,
            'keluhan' => $this->faker->sentence(),
            'tanggal_service' => $this->faker->date(),
        ];
    }
}

