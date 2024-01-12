<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class KelasSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            if (Kelas::where('nama_kelas', $i)->count() === 0)
                Kelas::create([
                    'kelas_id' => "K{$faker->unique()->numberBetween(1, 999)}",
                    'nama_kelas' => $i,
                    'keterangan' => $faker->randomElement(['aktif', 'tidak aktif'])
                ]);
        }
    }
}
