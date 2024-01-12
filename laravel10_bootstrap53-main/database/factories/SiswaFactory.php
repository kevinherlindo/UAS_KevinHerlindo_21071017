<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'id_siswa'   => rand(1, 9999999),
            'nama_siswa' =>fake()->name(),
            //'email'    =>fake()->unique()->safeEmail(),
            'alamat'     => '',
            'phone'      => rand(1, 9999999999),
            'gender'     => 'M'      
        ];
    }
}
