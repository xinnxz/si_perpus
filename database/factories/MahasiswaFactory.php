<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'npm' => $this->faker->unique()->numerify('55201#####'),
            'id_prodi' => $this->faker->numberBetween(1, 3), // Sesuaikan dengan id_prodi yang Anda miliki
        ];
    }
}
