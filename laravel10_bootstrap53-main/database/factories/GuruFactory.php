<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_guru'   => rand(1, 9999999),
            'nama_guru' =>fake()->name(),
            //'email'    =>fake()->unique()->safeEmail(),
            'alamat'     => '',
            'phone'      => rand(1, 9999999999),
            'gender'     => 'M'      
        ];
    }
}
