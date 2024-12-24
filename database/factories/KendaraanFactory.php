<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan;

class KendaraanFactory extends Factory
{
    public function definition()
    {
        return [
            'no_plat' => strtoupper($this->faker->bothify('AB #### ??')),
            'jenis_kendaraan' => $this->faker->randomElement(['Matic', 'Manual Transmisi']),
            'no_stnk' => $this->faker->regexify('[A-Z0-9]{10}'),
            'tahun_pembuatan' => $this->faker->year(),
            'nama_pemilik' => $this->faker->name(),
            'warna_kendaraan' => $this->faker->colorName(),
            'id_pelanggan' => Pelanggan::inRandomOrder()->first()->id,
        ];
    }
}

