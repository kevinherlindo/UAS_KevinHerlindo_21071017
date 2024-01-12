<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Dosen;
use App\Models\GalehLudi\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class ProdiSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        if (Dosen::count() === 0)
            $this->call(DosenSeeder::class);

        $prodi = ['Sistem Informasi', 'Teknik Informatika'];
        $id = '';
        $dosen = '';

        for ($i = 0; $i < 2; $i++) {
            while ($dosen === $id) {
                $dosen = Dosen::inRandomOrder()->first('dosen_id')->dosen_id;
            }

            $id = $dosen;

            if (Prodi::where('nama_prodi', $prodi[$i])->count() === 0)
                Prodi::create([
                    'prodi_id' => "PD{$faker->unique()->numberBetween(1, 999)}",
                    'nama_prodi' => $prodi[$i],
                    'pejabat' => $id
                ]);
        }
    }
}
