<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Ruang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class RuangSeeder By Galeh Ludi');
        $faker = fake('id_ID');
        $abjad = "ABCDEFGH";

        for ($i = 0; $i < strlen($abjad); $i++) {
            if (Ruang::where('nama_ruang', $abjad[$i])->count() === 0)
                Ruang::create([
                    'ruang_id' => "R{$faker->unique()->numberBetween(1, 999)}",
                    'nama_ruang' => $abjad[$i]
                ]);
        }
    }
}
