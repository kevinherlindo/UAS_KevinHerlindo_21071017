<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Hari;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class HariSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        for ($i = 0; $i < count($hari); $i++) {
            if (Hari::where('nama_hari', $hari[$i])->count() === 0)
                Hari::create([
                    'hari_id' => "H{$faker->unique()->numberBetween(1, 999)}",
                    'nama_hari' => $hari[$i]
                ]);
        }
    }
}
