<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DaftarService;

class ServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'id_daftar_service' => DaftarService::inRandomOrder()->first()->id,
            'estimasi_service' => $this->faker->time(),
            'nama_mekanik' => $this->faker->name(),
            'sparepart_pengganti' => $this->faker->word(),
        ];
    }
}

